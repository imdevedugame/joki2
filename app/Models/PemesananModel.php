<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    protected $allowedFields = [
        'id_member',
        'id_paket',
        'tanggal',
        'jumlah_orang',
        'total_bayar',
        'status',
        'bukti_pembayaran',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
