<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembayaranHomestaySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_pemesanan'  => 1,
                'metode'        => 'Transfer Bank',
                'bukti'         => 'bukti1.jpg',
                'status'        => 'Diterima',
                'tanggal_bayar' => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id_pemesanan'  => 2,
                'metode'        => 'E-Wallet',
                'bukti'         => 'bukti2.jpg',
                'status'        => 'Menunggu',
                'tanggal_bayar' => null,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('pembayaran_homestay')->insertBatch($data);
    }
}
