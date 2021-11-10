<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $users;

    function __construct()
    {
        $this->users = new UsersModel();
    }

    public function index()
    {
        $data['users'] = $this->users->findAll();
        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->users->insert([
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password_hash'),
        ]);
        
        session()->setFlashdata('message', 'Tambah Data Pegawai Berhasil');
        return redirect()->to('/users');
        
    }

    function edit($id)
    {
        $dataUsers = $this->users->find($id);
        if (empty($dataUsers)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Users Tidak ditemukan !');
        }
        $data['users'] = $dataUsers;
        return view('users/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            
            

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->users->update($id, [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password_hash'),
            
            
        ]);
        session()->setFlashdata('message', 'Update Data Users Berhasil');
        return redirect()->to('/users');
    }

    function delete($id)
    {
        $dataUsers = $this->users->find($id);
        if (empty($dataUsers)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Users Tidak ditemukan !');
        }
        $this->users->delete($id);
        session()->setFlashdata('message', 'Delete Data Users Berhasil');
        return redirect()->to('/users');
    }
}
