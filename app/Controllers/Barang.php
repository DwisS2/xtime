<?php

namespace App\Controllers;

class Barang extends BaseController
{

    public function __construct()
	{
		helper('form');
        $this->validation = \Config\Services::validation();
		
	}

    public function index()
    {
        $barangModel = new \App\Models\BarangModel();
		$barangs = $barangModel->findAll();
		

		return view('barang/index',[
			'barangs'=>$barangs,
		]);
    }

    public function create()
    {
        if($this->request->getPost())
		{
			//jika ada data yang di post
			$data = $this->request->getPost();
			$this->validation->run($data, 'barang');
			$errors = $this->validation->getErrors();

			if(!$errors)
			{
				//simpan datanya
				$barangModel = new \App\Models\BarangModel();

				$barang = new \App\Entities\Barang();

				$barang->fill($data);
				$barang->gambar = $this->request->getFile('gambar');
				$barang->created_date = date("Y-m-d H:i:s");

				$barangModel->save($barang);

				$id = $barangModel->insertID();

				$segments = ['barang', 'index', $id];
				// /barang/view/$id
                session()->setFlashdata('message', 'Create Data Product Berhasil');
				return redirect()->to(site_url($segments));

			}
		}
        
		return view('barang/create');
    }

    public function update()
    {
        $id = $this->request->uri->getSegment(3);

		$barangModel = new \App\Models\BarangModel();

		$barang = $barangModel->find($id);

		if($this->request->getPost())
		{
			$data = $this->request->getPost();
			$this->validation->run($data, 'barangupdate');
			$errors = $this->validation->getErrors();

			if(!$errors)
			{
				$b = new \App\Entities\Barang();
				$b->id = $id;
				$b->fill($data);

				if($this->request->getFile('gambar')->isValid()){
					$b->gambar = $this->request->getFile('gambar');
				}

				$b->updated_date = date("Y-m-d H:i:s");

				$barangModel->save($b);
				
				$segments = ['Barang','index',$id];
                session()->setFlashdata('message', 'Update Data Product Berhasil');
				return redirect()->to(base_url($segments));
			}
		}

		return view('barang/update',[
			'barang' => $barang,
		]);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);

		$modelBarang = new \App\Models\BarangModel();
		$delete = $modelBarang->delete($id);
        session()->setFlashdata('message', 'Delete Data Product Berhasil');
		return redirect()->to(site_url('barang/index'));
    }
}