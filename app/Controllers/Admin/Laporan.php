<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemesananModel;
use App\Models\PembayaranModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    public function index()
{
    $db = \Config\Database::connect();

    // Pembayaran Wisata
    $data['pembayaran_wisata'] = $db->table('pembayaran')
        ->select('pembayaran.*, pemesanan.total_bayar, member.nama_lengkap, "Wisata" as jenis')
        ->join('pemesanan', 'pemesanan.id_pemesanan = pembayaran.id_pemesanan')
        ->join('member', 'member.id_member = pemesanan.id_member')
        ->get()
        ->getResultArray();

    // Pembayaran Homestay
    $data['pembayaran_homestay'] = $db->table('pembayaran_homestay')
        ->select('pembayaran_homestay.*, pemesanan_homestay.total_bayar, member.nama_lengkap, "Homestay" as jenis')
        ->join('pemesanan_homestay', 'pemesanan_homestay.id_pemesanan_homestay = pembayaran_homestay.id_pemesanan')
        ->join('member', 'member.id_member = pemesanan_homestay.id_member')
        ->get()
        ->getResultArray();

    // Gabungkan semua data pembayaran (opsional, jika ingin ditampilkan dalam satu tabel)
    $data['semua_pembayaran'] = array_merge($data['pembayaran_wisata'], $data['pembayaran_homestay']);

    // Hitung total masing-masing
    $totalWisata = array_sum(array_column($data['pembayaran_wisata'], 'total_bayar'));
    $totalHomestay = array_sum(array_column($data['pembayaran_homestay'], 'total_bayar'));

    $data['total_wisata'] = $totalWisata;
    $data['total_homestay'] = $totalHomestay;
    $data['total_semua'] = $totalWisata + $totalHomestay;

    return view('admin/laporan', $data);
}
public function exportExcel()
{
    $db = \Config\Database::connect();

    // Gabungkan data wisata
    $wisata = $db->table('pembayaran')
        ->select("pembayaran.*, pemesanan.total_bayar, member.nama_lengkap, pembayaran.tanggal_bayar, pembayaran.status, 'Wisata' as jenis")
        ->join('pemesanan', 'pemesanan.id_pemesanan = pembayaran.id_pemesanan')
        ->join('member', 'member.id_member = pemesanan.id_member')
        ->get()->getResultArray();

    // Gabungkan data homestay
    $homestay = $db->table('pembayaran_homestay')
        ->select("pembayaran_homestay.*, pemesanan_homestay.total_bayar, member.nama_lengkap, pembayaran_homestay.tanggal_bayar, pembayaran_homestay.status, 'Homestay' as jenis")
        ->join('pemesanan_homestay', 'pemesanan_homestay.id_pemesanan_homestay = pembayaran_homestay.id_pemesanan')
        ->join('member', 'member.id_member = pemesanan_homestay.id_member')
        ->get()->getResultArray();

    $dataGabungan = array_merge($wisata, $homestay);

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Jenis');
    $sheet->setCellValue('D1', 'Total Bayar');
    $sheet->setCellValue('E1', 'Status');
    $sheet->setCellValue('F1', 'Tanggal Bayar');

    // Data rows
    $row = 2;
    $total = 0;
    foreach ($dataGabungan as $index => $d) {
        $sheet->setCellValue('A' . $row, $index + 1);
        $sheet->setCellValue('B' . $row, $d['nama_lengkap']);
        $sheet->setCellValue('C' . $row, $d['jenis']);
        $sheet->setCellValue('D' . $row, $d['total_bayar']);
        $sheet->setCellValue('E' . $row, $d['status']);
        $sheet->setCellValue('F' . $row, $d['tanggal_bayar'] ?? '-');

        $total += (int)$d['total_bayar'];
        $row++;
    }

    // Total
    $sheet->setCellValue('C' . $row, 'Total Keseluruhan');
    $sheet->setCellValue('D' . $row, $total);

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $filename = 'laporan_pembayaran_gabungan.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment;filename=\"$filename\"");
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
}
public function exportPdf()
{
    $db = \Config\Database::connect();

    // Gabung data pembayaran
    $wisata = $db->table('pembayaran')
        ->select("pembayaran.*, pemesanan.total_bayar, member.nama_lengkap, pembayaran.tanggal_bayar, pembayaran.status, 'Wisata' as jenis")
        ->join('pemesanan', 'pemesanan.id_pemesanan = pembayaran.id_pemesanan')
        ->join('member', 'member.id_member = pemesanan.id_member')
        ->get()->getResultArray();

    $homestay = $db->table('pembayaran_homestay')
        ->select("pembayaran_homestay.*, pemesanan_homestay.total_bayar, member.nama_lengkap, pembayaran_homestay.tanggal_bayar, pembayaran_homestay.status, 'Homestay' as jenis")
        ->join('pemesanan_homestay', 'pemesanan_homestay.id_pemesanan_homestay = pembayaran_homestay.id_pemesanan')
        ->join('member', 'member.id_member = pemesanan_homestay.id_member')
        ->get()->getResultArray();

    $data['pembayaran'] = array_merge($wisata, $homestay);
    $data['total'] = array_sum(array_column($data['pembayaran'], 'total_bayar'));

    $dompdf = new \Dompdf\Dompdf();
    $html = view('admin/laporanpdf', $data);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('laporan_pembayaran.pdf', ['Attachment' => false]);
}
}
