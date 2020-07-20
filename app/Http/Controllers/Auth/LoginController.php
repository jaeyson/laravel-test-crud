<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Auth;

class LoginController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        return view('welcome');
    }

    public function signIn()
    {
        //todo: firebase service
        $this->auth->signInWithEmailAndPassword('john.smith@email.co', 'test1234');
        dd($this->auth->)
    }
}
