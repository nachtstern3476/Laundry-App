<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// $encrypter = \Config\Services::encrypter();
		// $enc = base64_encode($encrypter->encrypt('kasir'));
		// $temp = $enc;
		// $dec = $encrypter->decrypt(base64_decode(''));
		// echo $enc.' dan '.$dec;
		return view('index');
	}
}
