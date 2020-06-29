<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
  public function show(int $id)
  {
    $user = User::find($id);
    $title = $user->name . "Contact List";

    return view('accounts.public', compact('user', 'title'));
  }
}
