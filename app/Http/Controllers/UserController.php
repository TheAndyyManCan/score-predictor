<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
