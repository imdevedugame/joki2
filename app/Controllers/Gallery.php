<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index()
    {
        $model = new GalleryModel();

        // Ambil semua data galeri dari database
        $data['galleries'] = $model->findAll();

        // Kirim ke view dengan data 'galleries'
        return view('gallery/index', $data);
    }
}
