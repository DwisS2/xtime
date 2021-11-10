<?php

namespace App\Controllers;

use App\Models\FeedbackAdminModel;

class Feedbackuser extends BaseController
{
    protected $feedback;

    function __construct()
    {
        $this->feedback = new FeedbackAdminModel();
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
        
        session()->setFlashdata('message', 'Tambah Data Feedback Berhasil');
        return redirect()->to('/contact');
        
    }

    
}
