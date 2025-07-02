<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananHomestayModel extends Model
{
    protected $table            = 'pemesanan_homestay';
    protected $primaryKey       = 'id_pemesanan_homestay';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'id_member',
        'id_homestay',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_orang',
        'total_bayar',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
