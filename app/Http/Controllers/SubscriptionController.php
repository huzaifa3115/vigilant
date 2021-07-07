<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionStoreRequest;
use App\Models\Payment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use \Stripe\Stripe;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function retrievePlans()
    {
        $key = \config('services.stripe.secret');
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->plans->all();
        $plans = $plansraw->data;

        foreach ($plans as $plan) {
            $prod = $stripe->products->retrieve(
                $plan->product, []
            );
            $plan->product = $prod;
        }
        return $plans;
    }
    public function showSubscription($id)
    {
        $plans = $this->retrievePlans();
        $user = Auth::user();

        return view('checkout', [
            'user' => $user,
            'intent' => $user->createSetupIntent(),
            'plans' => $plans,
            'id' => $id,
        ]);
    }
    public function processSubscription(SubscriptionStoreRequest $request)
    {
        // dd($request->all());
        try {
            $user = Auth::user();
            $paymentMethod = $request->input('payment_method');

            $user->createOrGetStripeCustomer();
            $user->addPaymentMethod($paymentMethod);
            $plan = $request->input('plan');
            $ss = $user->newSubscription('default', $plan)->create($paymentMethod, [
                'email' => $user->email,
            ]);

            $ss->ends_at = Carbon::now()->addMonth();
            $ss->save();

            $this->createPayments($request->all(), $user);

            $user->package_type = $request->get('package_type');
            $user->save();

            // $seller = User::findOrFail(Auth::user()->id);
            // $seller->notify(new SubscriptionNotification($seller));

            return redirect('/discord');

        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect()->route('index')->with('success', 'Your plan subscribed successfully');
    }

    public function createPayments($request, $user)
    {

        Payment::create([
            'user_id' => Auth::user()->id,
            'stripe_id' => $user->stripe_id,
            'plan_id' => $request['plan'],
            'payment_method_id' => $request['payment_method'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'user_name' => $request['user_name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'address2' => $request['address2'],
            'country' => $request['country'],
            'state' => $request['state'],
            'zip' => $request['zip'],
        ]);
    }

    public function discordLogin()
    {
        return redirect('https://discord.com/oauth2/authorize?client_id=861621888086310944&redirect_uri=' . urlencode(env('DISCORD_URL')) . '&scope=email+identify+guilds.join&response_type=code');
    }

    public function handleProviderCallback(Request $request)
    {
        // $user = Http::withHeaders([
        //     'authorization' => 'Bot ODYxNjIxODg4MDg2MzEwOTQ0.YOMd6g.ZmBunHz6lltG9bOv6An214kSlUc',
        //     'content-type' => 'application/json',
        // ])->get('https://discord.com/api/guilds/785207462114230293/roles');

        // "id" => "788259785207840818"
        // "name" => "Private"

        // "id" => "785399225898631169"
        // "name" => "Premium"

        // dd($user, $user->json());

        //verify code and get access token
        $response = Http::asForm()->post('https://discord.com/api/oauth2/token', [
            'grant_type' => 'authorization_code',
            'client_id' => '861621888086310944',
            'client_secret' => 'CyU-XvwDFKVR2V8A_a3Yq3tJ_mmtkb7c',
            'code' => $request->get('code'),
            'redirect_uri' => env('DISCORD_URL'),
        ]);


        if ($response->successful()) {
            // get user id and object by sending above access token as bearer

            $user = Http::withHeaders([
                'authorization' => $response->json('token_type') . ' ' . $response->json('access_token'),
                'content-type' => 'application/json',
            ])->get('https://discord.com/api/users/@me');

            if ($user->successful()) {
                $customer = User::findOrFail(Auth::user()->id);
                $customer->update([
                    'discord_access_token' => $response->json('access_token'),
                    'discord_user_id' => $user->json('id'),
                ]);

                // add user in server/guild by adding guild id(static) and user id taken from above
                $result = Http::withHeaders([
                    'authorization' => 'Bot ODYxNjIxODg4MDg2MzEwOTQ0.YOMd6g.ZmBunHz6lltG9bOv6An214kSlUc',
                    'content-type' => 'application/json',
                ])->put('https://discord.com/api/guilds/785207462114230293/members/' . $user->json('id'), [
                    'access_token' => $response->json('access_token'),
                ]);

                if ($result->successful()) {

                    $loginUser = Auth::user();

                    $roleId = ($loginUser->package_type == 'premium') ? "785399225898631169" : "788259785207840818";

                    $role = Http::withHeaders([
                        'authorization' => 'Bot ODYxNjIxODg4MDg2MzEwOTQ0.YOMd6g.ZmBunHz6lltG9bOv6An214kSlUc',
                        'content-type' => 'application/json',
                    ])->put('https://discord.com/api/guilds/785207462114230293/members/'. $user->json('id') . '/roles/' . $roleId);


                    if ($role->successful()){
                        return redirect()->route('index')->with('success', 'User Successfully Subscribe');
                    }else{
                        return redirect()->route('index')->with('success', 'Roles Not Add');
                    }

                    return redirect()->route('index')->with('success', 'User Successfully Subscribe');
                } else {
                    return redirect()->route('index')->with('success', 'Result Not Found');
                }

            } else {
                return redirect()->route('index')->with('success', 'User Not Found');
            }
        } else {
            return redirect()->route('index')->with('success', 'Access Token Not Found');
        }
        return redirect()->route('index')->with('success', 'User Successfully Subscribe');
    }
}
