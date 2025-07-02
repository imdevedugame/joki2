<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PemesananHomestaySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_member'        => 1,
            'id_homestay'      => 1,
            'tanggal_mulai'    => '2025-07-01',
            'tanggal_selesai'  => '2025-07-03',
            'jumlah_orang'     => 2,
            'total_bayar'      => 750000,
            'status'           => 'Menunggu Pembayaran',
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        $this->db->table('pemesanan_homestay')->insert($data);
    }
}
