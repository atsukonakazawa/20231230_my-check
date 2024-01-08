<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $register=$request->all();
        User::create($register);

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $result = Contact::paginate(10);

        return view('management', ['forms' => $result]);
    }

    public function manage(Request $request)
    {
        $result = Contact::paginate(10);

        return view('management', ['forms' => $result]);
    }

    public function logout(Request $request)
    {
        return view('auth.login');
    }
}