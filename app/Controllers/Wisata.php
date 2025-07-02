<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaketWisataModel;

class Wisata extends BaseController
{
    public function index()
    {
        $paketModel = new PaketWisataModel();
        $data['pakets'] = $paketModel->findAll(); // Ini penting agar $pakets tersedia di view

        return view('wisata/index', $data);
    }

    public function detail($slug)
    {
        return view('wisata/detail');
    }

    public function search()
    {
        $paketModel = new PaketWisataModel();
        $keyword = $this->request->getGet('q');
        $data['pakets'] = $paketModel
            ->like('nama_paket', $keyword)
            ->orLike('deskripsi', $keyword)
            ->findAll();

        return view('wisata/search', $data);
    }
}
