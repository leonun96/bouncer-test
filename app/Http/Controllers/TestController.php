<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


use Bouncer;

class TestController extends Controller
{
	public function __construct ()
	{
		// 
	}
	public function index ()
	{
		return view('test');
	}
}
