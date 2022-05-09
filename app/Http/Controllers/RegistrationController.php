<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $request->password = Hash::make($request->password);
        $user = User::create(
            request([
                'name',
                'email',
                'password'
            ])
        );

        return view('register')->with('successMsg', 'Agora é com você e a API!');
    }
}
