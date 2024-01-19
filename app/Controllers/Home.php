<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Beranda | Museum nasional Indonesia'
        ];
        return view('pages/index', $data);
    }
}
