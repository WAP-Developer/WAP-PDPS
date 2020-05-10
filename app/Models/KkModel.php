<?php

namespace App\Models;

use CodeIgniter\Model;

class KkModel extends Model
{
    protected $table      = 'kk';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nokk', 'kepalakk', 'jmlanggota', 'alamat', 'rtrw', 'desa', 'kecamatan', 'kabupaten', 'kodepos', 'provinsi', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
