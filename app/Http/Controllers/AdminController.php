<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Neweducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
    $coursesnew = course::all();
    return view('admin.dashboard');
    }


    public function loginPage()
    {
        return view('admin.login');
    }

    public function loginChek(Request $require)
    {
        $credentials = $require->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if (Auth::attempt($credentials)) {
            $require->session()->regenerate();
            return redirect()->route("dashboard.page");
        }

        return redirect()->back()
            ->withErrors(['email' => 'Email yoki parol noto\'g\'ri.'])
            ->onlyInput('email');
    }

    public function registerPage()
    {
        return view('admin.register');
    }

    public function registerPost(Request $require)
    {
        $data = $require->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.page');
    }




}
