<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReferController extends Controller
{
    public function index(){

        $referCode = Str::random(10);
        return view('refer', compact('referCode'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'refer_code' => $request->get('refer_code'),
        ]);
        return redirect()->route('index')->with('success', 'Referal Code Proceed Successfully');
    }
}
