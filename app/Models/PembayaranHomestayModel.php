<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranHomestayModel extends Model
{
    protected $table            = 'pembayaran_homestay';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id_pemesanan',
        'metode',
        'bukti',
        'status',
        'tanggal_bayar',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps    = true;
}
