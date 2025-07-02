<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Homestay extends BaseController
{
    public function index()
    {
        $model = new \App\Models\HomestayModel();

        // Ambil semua homestay dari database
        $data['homestays'] = $model->findAll();

        return view('homestay/index', $data);
    }


    public function detail($slug)
    {
        // Tampilkan detail homestay tertentu
        return view('homestay/detail');
    }
    public function search()
    {
        $harga_min = $this->request->getGet('harga_min');
        $harga_max = $this->request->getGet('harga_max');

        $model = new \App\Models\HomestayModel();
        $query = $model;

        if ($harga_min !== null && $harga_min !== '') {
            $query = $query->where('harga_per_malam >=', $harga_min);
        }

        if ($harga_max !== null && $harga_max !== '') {
            $query = $query->where('harga_per_malam <=', $harga_max);
        }

        $data['homestays'] = $query->findAll();

        return view('homestay/search', $data);
    }
}
