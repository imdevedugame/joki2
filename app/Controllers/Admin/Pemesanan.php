<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\PemesananHomestayModel;
use App\Models\PembayaranModel;
use App\Models\PembayaranHomestayModel;

class Pemesanan extends BaseController
{
    public function index()
    {
        $data['pemesanan_wisata'] = (new PemesananModel())->findAll();
        $data['pemesanan_homestay'] = (new PemesananHomestayModel())->findAll();
        return view('admin/pemesanan', $data);
    }

    public function pembayaranWisata()
    {
        $data['pembayaran'] = (new PembayaranModel())->findAll();
        return view('admin/pemesanan/pembayaran_wisata', $data);
    }

    public function pembayaranHomestay()
    {
        $data['pembayaran'] = (new PembayaranHomestayModel())->findAll();
        return view('admin/pemesanan/pembayaran_homestay', $data);
    }

    public function konfirmasiPembayaran($id)
    {
        $model = new PembayaranModel();
        $model->update($id, [
            'status' => 'Dikonfirmasi',
            'tanggal_bayar' => date('Y-m-d')
        ]);
        return redirect()->back()->with('success', 'Pembayaran dikonfirmasi.');
    }
}
