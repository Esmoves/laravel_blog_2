<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Author;


class RegistrationController extends Controller
{

  public function create()
	{

    return view('sessions.create');

  }


	public function store(Request $request)
	{

	 	 // Validate form
     $this->validate(request(), [
			'username' => 'required',

			'firstname' => 'required',

			'lastname' => 'required',

			'email'=>'required|unique:authors|email',

			'password' => 'required|confirmed'

		]);

		//create author
		$author = Author::create([
			'username' => request('username'),
			'firstname' => request('firstname'),
			'lastname' => request('lastname'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
			]);

		// //login
		auth()->login($author);

		// redirect to homepage
		return redirect()->home();

	}


}
