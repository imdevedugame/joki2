<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\VideoModel;

class Video extends BaseController
{
    public function index()
    {
        $model = new VideoModel();
        $data['videos'] = $model->findAll();

        return view('video/index', $data);
    }
}
