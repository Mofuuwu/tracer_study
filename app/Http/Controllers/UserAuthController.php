<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function edit_data_akun(Request $request)
    {
        $user = Auth::user(); 

        $validatedRequest = $request->validate([
            'email' => [
                'email',
                Rule::unique('users')->ignore($user->id), 
            ],
            'password' => ['nullable', 'min:8', 'confirmed'], 
        ]);

        $user->email = $validatedRequest['email'];

        if (!empty($validatedRequest['password'])) { 
            $user->password = bcrypt($validatedRequest['password']);
        }

        $user->save(); 

        return redirect()->back()->with('success', 'Data akun berhasil diperbarui!');
    }
}
