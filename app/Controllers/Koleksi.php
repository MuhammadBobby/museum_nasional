<?php

namespace App\Controllers;

use App\Models\KoleksiModel;

class Koleksi extends BaseController
{
    // property
    protected $KoleksiModel;

    public function __construct()
    {
        $this->KoleksiModel = new KoleksiModel();
    }



    // index
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Koleksi | Museum nasional Indonesia',
            'search' => true,
            'koleksi' => $this->KoleksiModel->getKoleksi()
        ];
        return view('koleksi/index', $data);
    }


    // detail
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Koleksi |  Museum nasional Indonesia',
            'koleksi' =>  $this->KoleksiModel->getKoleksi($id)
        ];

        if (empty($data['koleksi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi ' . $id . ' tidak ditemukan');
        }

        return view('koleksi/detail', $data);
    }
}
