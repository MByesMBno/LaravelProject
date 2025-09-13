<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegController extends Controller
{
    public function index()
    {
        $backUrl=route("login");
        return view('reg', compact('backUrl'));
    }
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false,
        ]);

        return redirect('/login')->with('success', 'Регистрация прошла успешно!');
    }
}
