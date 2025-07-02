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

        $data['pembayaran'] = $db->table('pembayaran')
            ->select('pembayaran.*, pemesanan.total_bayar, member.nama_lengkap')
            ->join('pemesanan', 'pemesanan.id_pemesanan = pembayaran.id_pemesanan')
            ->join('member', 'member.id_member = pemesanan.id_member') // JOIN ke tabel member
            ->get()
            ->getResultArray();

        return view('admin/laporan', $data);
    }


    public function exportExcel()
    {
        $db = \Config\Database::connect();

        $data = $db->table('pembayaran')
            ->select('pembayaran.*, pemesanan.total_bayar, member.nama_lengkap, pembayaran.tanggal_bayar, pembayaran.status')
            ->join('pemesanan', 'pemesanan.id_pemesanan = pembayaran.id_pemesanan')
            ->join('member', 'member.id_member = pemesanan.id_member')
            ->get()
            ->getResultArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Total Bayar');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Tanggal Bayar');

        $row = 2;
        foreach ($data as $index => $d) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $d['nama_lengkap']);
            $sheet->setCellValue('C' . $row, $d['total_bayar']);
            $sheet->setCellValue('D' . $row, $d['status']);
            $sheet->setCellValue('E' . $row, $d['tanggal_bayar']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan_pembayaran_wisata.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportPdf()
    {
        $db = \Config\Database::connect();

        $data['pembayaran'] = $db->table('pembayaran')
            ->select('pembayaran.*, pemesanan.total_bayar, member.nama_lengkap, pembayaran.tanggal_bayar, pembayaran.status')
            ->join('pemesanan', 'pemesanan.id_pemesanan = pembayaran.id_pemesanan')
            ->join('member', 'member.id_member = pemesanan.id_member')
            ->get()
            ->getResultArray();

        $dompdf = new \Dompdf\Dompdf();
        $html = view('admin/laporanpdf', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan_pembayaran.pdf', ['Attachment' => false]);
    }
}
