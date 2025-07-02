<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaketWisataModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $paketModel = new PaketWisataModel();
        $data['paket'] = $paketModel->findAll(); // ✅ Ambil semua paket

        return view('admin/dashboard', $data); // ✅ Kirim ke view
    }
}
