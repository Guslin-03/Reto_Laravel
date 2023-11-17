<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ChangePasswordController extends Controller
{
    public function edit(User $user)
    {
        return view('auth.password', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {


        $request->validate([
            'password' => 'required',
            'password2' => 'required|min:8',
            'password3' => 'required|same:password2',

        ]);


        $user = Auth::user();

        if (!\Hash::check($request->password, $user->password)) {
            return back()->with('error', 'La contraseña no se ha podido cambiar.');
        }

        $user->update([
            'password' => \Hash::make($request->password2),
        ]);

        return back()->with('success', 'La contraseña ha sido cambiada con éxito.');
    }
}

