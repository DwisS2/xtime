<?php

namespace App\Controllers;

class Halaman extends BaseController
{
public function shop()
	{
		echo view('shop');
	}

	public function about()
	{
		echo view('about');
	}

	public function contact()
	{
		echo view('contact');
	}

	public function logout()
	{
		echo view('login');
	}
}