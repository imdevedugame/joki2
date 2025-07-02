<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketWisataModel extends Model
{
    protected $table = 'paket_wisata';
    protected $primaryKey = 'id_paket';

    protected $allowedFields = [
        'nama_paket',
        'deskripsi',
        'harga',
        'gambar',
        'created_at',
        'updated_at'
    ];

    // Untuk penggunaan otomatis timestamp (jika diinginkan)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
