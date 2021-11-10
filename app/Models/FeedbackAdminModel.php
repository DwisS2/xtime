<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackAdminModel extends Model
{
    protected $table = "feedback";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'pesan', 'nama', 'email'];
}
