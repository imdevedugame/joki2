<?php

namespace App\Models;

use CodeIgniter\Model;

class HomestayModel extends Model
{
    protected $table = 'homestay';
    protected $primaryKey = 'id_homestay';

    protected $allowedFields = [
        'nama_homestay',
        'deskripsi',
        'harga_per_malam',
        'gambar',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
