<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Contact;

class ContactController extends Controller
{

    // All actions are guarded by auth
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::id())->get();
        // $contacts = Contact::find(Auth::id())->get();
        $title = Auth::user()->name . ": Contact List";

        return Http::get(env('MYEMAILVERIFY_ENDPOINT', ''), [
            'email' => 'hello@jaeyson.ml',
            'apikey' => env('MYEMAILVERIFY_APIKEY', '')
        ])->json();

        // return env('APP_NAME', '???');

        // Log::info('jsondata', $response);

        // return view('contacts.index', compact('contacts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required'
        ]);

        (new Contact([
            'first_name'=> $request->get('first_name'),
            'last_name'=> $request->get('last_name'),
            'address'=> $request->get('address'),
            'user_id'=> Auth::id()
        ]))->save();

        return redirect('/contacts')->with('success', 'saved...');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $title = "Update Contact: " . $contact->first_name . " " . $contact->last_name;

        //return view('contacts.edit', compact('contact'));
        return view('contacts.edit', compact('contact', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required'
        ]);

        $contact = Contact::find($id);

        $contact->first_name = $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->address = $request->get('address');
        $contact->save();

        return redirect('/contacts')->with('success', 'updated...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();

        return redirect('/contacts')->with('success', 'deleted...');

    }
}
