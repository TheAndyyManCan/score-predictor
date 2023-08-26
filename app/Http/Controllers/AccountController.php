<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function update()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['email', 'required']
        ]);

        $user = User::find(auth()->id());
        $user->update($attributes);
        return redirect('/account')->with('success', 'Account updated successfully');
    }
}
