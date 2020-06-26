<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AccountController extends Controller
{
  //public function show(int $id) : \Illuminate\Http\Response
  public function show(int $id)
  {
    $user = User::where('id', $id)->first();

    return view('accounts.index')->with('user', $user);
  }
}
