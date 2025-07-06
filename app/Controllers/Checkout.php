<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Checkout extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('checkout/index');
    }

    // ---------------------------- PESAN WISATA ----------------------------
    public function pesanWisata($id)
    {
        $model = new \App\Models\PaketWisataModel();
        $paket = $model->find($id);

        if (!$paket) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Paket tidak ditemukan');
        }

        return view('wisata/pemesanan', ['paket' => $paket]);
    }

    public function simpanPesanan()
    {
        $pemesananModel = new \App\Models\PemesananModel();

        $data = [
            'id_member'    => session('member_id'),
            'id_paket'     => $this->request->getPost('id_paket'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'jumlah_orang' => $this->request->getPost('jumlah_orang'),
            'total_bayar'  => str_replace(['Rp', '.', ','], '', $this->request->getPost('total_bayar')),
            'status'       => 'Menunggu Pembayaran',
            'created_at'   => date('Y-m-d H:i:s'),
        ];

        $pemesananModel->insert($data);
        $idPemesanan = $pemesananModel->getInsertID();

        return redirect()->to('/member/pembayaran/' . $idPemesanan);
    }
public function pembayaran($id)
{
    $pemesananModel = new \App\Models\PemesananModel();

    $data['pemesanan'] = $pemesananModel
        ->select('pemesanan.*, paket_wisata.nama_paket, paket_wisata.harga')
        ->join('paket_wisata', 'paket_wisata.id_paket = pemesanan.id_paket')
        ->where('pemesanan.id_pemesanan', $id)
        ->first();

    if (!$data['pemesanan']) {
        log_message('error', 'Gagal load pembayaran untuk ID pemesanan: ' . $id);
        return redirect()->to('/')->with('error', 'Data tidak ditemukan.');
    }

    return view('wisata/pembayaran', $data);
}


    public function simpanPembayaran()
    {
        $id_pemesanan = $this->request->getPost('id_pemesanan');
        $metode = $this->request->getPost('metode');
        $bukti = $this->request->getFile('bukti');

        if ($bukti && $bukti->isValid() && !$bukti->hasMoved()) {
            $namaBukti = $bukti->getRandomName();
            $bukti->move('uploads/bukti/', $namaBukti);

            $pembayaranModel = new \App\Models\PembayaranModel();
            $pembayaranModel->save([
                'id_pemesanan'  => $id_pemesanan,
                'metode'        => $metode,
                'bukti'         => $namaBukti,
                'status'        => 'Menunggu',
                'tanggal_bayar' => null,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/member/riwayat')->with('success', 'Pembayaran berhasil dikirim.');
        }

        return redirect()->back()->with('error', 'Upload bukti gagal.');
    }

    // ---------------------------- PESAN HOMESTAY ----------------------------
    public function pesanHomestay($id)
    {
        $homestayModel = new \App\Models\HomestayModel();
        $homestay = $homestayModel->find($id);

        if (!$homestay) {
            return redirect()->to('/homestay')->with('error', 'Homestay tidak ditemukan');
        }

        return view('homestay/pemesanan', ['homestay' => $homestay]);
    }

    public function simpanPesananHomestay()
    {
        $model = new \App\Models\PemesananHomestayModel();

        $checkin = $this->request->getPost('tanggal_mulai');
        $malam = (int) $this->request->getPost('jumlah_malam');

        $data = [
            'id_member'       => session()->get('member_id'),
            'id_homestay'     => $this->request->getPost('id_homestay'),
            'tanggal_mulai'   => $checkin,
            'tanggal_selesai' => date('Y-m-d', strtotime($checkin . ' + ' . $malam . ' days')),
            'jumlah_orang'    => $this->request->getPost('jumlah_orang'),
            'jumlah_malam'    => $malam,
            'total_bayar'     => str_replace(['Rp', '.', ','], '', $this->request->getPost('total_bayar')),
            'status'          => 'Menunggu Pembayaran',
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);
        $id = $model->getInsertID();

        return redirect()->to('/member/pembayaran_homestay/' . $id);
    }

    public function pembayaran_homestay($id)
    {
        $pemesananModel = new \App\Models\PemesananHomestayModel();

        $data['pemesanan'] = $pemesananModel
            ->join('homestay', 'homestay.id_homestay = pemesanan_homestay.id_homestay')
            ->where('id_pemesanan_homestay', $id)
            ->first();

        if (!$data['pemesanan']) {
            return redirect()->to('/')->with('error', 'Data tidak ditemukan.');
        }

        return view('homestay/pembayaran', $data);
    }

    public function simpanPembayaranHomestay()
    {
        $id_pemesanan = $this->request->getPost('id_pemesanan');
        $metode = $this->request->getPost('metode');
        $bukti = $this->request->getFile('bukti');

        if ($bukti && $bukti->isValid() && !$bukti->hasMoved()) {
            $namaBukti = $bukti->getRandomName();
            $bukti->move('uploads/bukti/', $namaBukti);

            $model = new \App\Models\PembayaranHomestayModel();
            $model->save([
                'id_pemesanan'  => $id_pemesanan,
                'metode'        => $metode,
                'bukti'         => $namaBukti,
                'status'        => 'Menunggu',
                'tanggal_bayar' => null,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/member/riwayat')->with('success', 'Bukti pembayaran berhasil dikirim.');
        }

        return redirect()->back()->with('error', 'Gagal upload bukti pembayaran.');
    }

    // ---------------------------- RIWAYAT ----------------------------
   public function riwayat()
{
    $id_member = session()->get('member_id');

    // Ambil pembayaran wisata terakhir
    $subQueryPembayaran = $this->db->table('pembayaran')
        ->select('MAX(id_pembayaran) as id_pembayaran')
        ->groupBy('id_pemesanan');

    $wisata = $this->db->table('pemesanan')
        ->select('pemesanan.*, paket_wisata.nama_paket, pembayaran.metode, pembayaran.bukti, pembayaran.status AS status_bayar')
        ->join('paket_wisata', 'paket_wisata.id_paket = pemesanan.id_paket')
        ->join('pembayaran', 'pembayaran.id_pemesanan = pemesanan.id_pemesanan AND pembayaran.id_pembayaran IN (' . $subQueryPembayaran->getCompiledSelect() . ')', 'left', false)
        ->where('pemesanan.id_member', $id_member)
        ->get()->getResultArray();

    // Ambil pembayaran homestay terakhir
    $subQueryPembayaranHomestay = $this->db->table('pembayaran_homestay')
        ->select('MAX(id) as id')
        ->groupBy('id_pemesanan');

    $homestay = $this->db->table('pemesanan_homestay')
        ->select('pemesanan_homestay.*, homestay.nama_homestay, pembayaran_homestay.metode, pembayaran_homestay.bukti, pembayaran_homestay.status AS status_bayar')
        ->join('homestay', 'homestay.id_homestay = pemesanan_homestay.id_homestay')
        ->join('pembayaran_homestay', 'pembayaran_homestay.id_pemesanan = pemesanan_homestay.id_pemesanan_homestay AND pembayaran_homestay.id IN (' . $subQueryPembayaranHomestay->getCompiledSelect() . ')', 'left', false)
        ->where('pemesanan_homestay.id_member', $id_member)
        ->get()->getResultArray();

    return view('checkout/riwayat', [
        'wisata' => $wisata,
        'homestay' => $homestay
    ]);
}

}
