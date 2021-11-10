<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = "barang";
    protected $primaryKey = "id";
    protected $returnType = "App\Entities\Barang";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'harga', 'gambar', 'created_date', 'updated_date'];


    
}
