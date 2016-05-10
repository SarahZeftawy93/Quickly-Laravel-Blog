<?php

namespace Quickly_Blog\Http\Controllers;

use Illuminate\Http\Request;

use Quickly_Blog\Http\Requests;

use Quickly_Blog\User;

// logging controller

class LogController extends Controller
{
	// register page
    public function register()
    {
    	return view('user.register');
    }

    // login page
    public function login()
    {
    	return view('user.login');
    }
}
