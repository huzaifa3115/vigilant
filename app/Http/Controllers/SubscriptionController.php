<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use \Stripe\Stripe;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use App\Models\Payment;
use App\Notifications\SubscriptionNotification;

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
            'id' => $id
        ]);
    }
    public function processSubscription(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');

        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $plan = $request->input('plan');
        try {
            $user->newSubscription('default', $plan)->create($paymentMethod, [
                'email' => $user->email,
            ]);
            
            $this->createPayments($request->all(), $user);

            $seller = User::findOrFail(Auth::user()->id);
            $seller->notify(new SubscriptionNotification($seller));

        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

        return redirect()->route('index')->with('success', 'Your plan subscribed successfully');
    }


    public function createPayments($request, $user){

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
}
