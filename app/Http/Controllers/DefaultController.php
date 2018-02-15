<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
	public function test() {
		return view('monitoring');
	}
}
