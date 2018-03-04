<?php

namespace App\Http\Controllers;
use Auth;
use App\pegawai;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
	public function test() {
		$data = pegawai::all();
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
}
