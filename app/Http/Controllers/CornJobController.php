<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CornJobController extends Controller
{
    public function index()
    {
        try {
            $all_users = User::all();
            foreach ($all_users as $users):
                if (!$users->subscribed('default')) {

                    $user = Http::withHeaders([
                        'authorization' => 'Bearer ' . $users->discord_access_token,
                        'content-type' => 'application/json',
                    ])->get('https://discord.com/api/users/@me');

                    if ($user->successful()) {

                        $loginUser = Auth::user();
                        $roleId = ($loginUser->package_type == 'premium') ? "785399225898631169" : "788259785207840818";

                        $role = Http::withHeaders([
                            'authorization' => 'Bot ODYxNjIxODg4MDg2MzEwOTQ0.YOMd6g.ZmBunHz6lltG9bOv6An214kSlUc',
                            'content-type' => 'application/json',
                        ])->delete('https://discord.com/api/guilds/785207462114230293/members/' . $user->json('id') . '/roles/' . $roleId);
                    }
                }
            endforeach;
        } catch (\Exception $exception) {

        }
    }
}
