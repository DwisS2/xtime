<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->validation = \Config\Services::validation();
	}

	public function index()
	{
		$barang = new \App\Models\BarangModel();
		$model = $barang->findAll();
		return view('home/index',[
			'model' => $model,
		]);
	}

	

}
