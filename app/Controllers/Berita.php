<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\BeritaModel;

class Berita extends BaseController
{
    public function index()
    {
        $model = new BeritaModel();
        $data['beritas'] = $model->findAll();
        return view('berita/index', $data);
    }
}
