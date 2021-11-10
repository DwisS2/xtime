<?php

namespace App\Controllers;

use App\Models\FeedbackAdminModel;

class Feedbackadmin extends BaseController
{
    protected $feedback;

    function __construct()
    {
        $this->feedback = new FeedbackAdminModel();
    }

    public function index()
    {
        $data['feedback'] = $this->feedback->findAll();
        return view('feedback_admin/index', $data);
    }

    public function create()
    {
        return view('feedback_admin/create');
    }

    public function store()
    {
        if (!$this->validate([
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama' => [
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
            

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->feedback->insert([
            'pesan' => $this->request->getVar('pesan'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
        ]);
        
        session()->setFlashdata('message', 'Tambah Data Pegawai Berhasil');
        return redirect()->to('/feedback_admin');
        
    }

    function edit($id)
    {
        $dataFeedback = $this->feedback->find($id);
        if (empty($dataFeedback)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Users Tidak ditemukan !');
        }
        $data['feedback'] = $dataFeedback;
        return view('feedback_admin/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'pesan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama' => [
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
            
            

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->feedback->update($id, [
            'pesan' => $this->request->getVar('pesan'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            
            
        ]);
        session()->setFlashdata('message', 'Update Data Feedback Berhasil');
        return redirect()->to('/feedback_admin');
    }

    function delete($id)
    {
        $dataFeedbackadmin = $this->feedback->find($id);
        if (empty($dataFeedbackadmin)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Feedback Tidak ditemukan !');
        }
        $this->feedback->delete($id);
        session()->setFlashdata('message', 'Delete Data Feedback Berhasil');
        return redirect()->to('/feedback_admin');
    }
}
