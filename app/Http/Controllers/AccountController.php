<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AccountController extends Controller
{
  //public function edit(int $id) : \Illuminate\Http\Response
  public function edit(int $id)
  {
    $user = User::where('id', $id)->first();
    $title = "Account settings: " . Auth::user()->name;

    return view('accounts.index', compact('user', 'title'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'email'=>'required',
      'name'=>'required'
    ]);

    $user = User::find($id);

    $user->name = $request->get('name');
    $user->email = $request->get('email');
    $user->save();

    return redirect('/contacts')->with('success', 'updated...');

  }
}
