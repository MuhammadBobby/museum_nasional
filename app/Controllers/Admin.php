<?php

namespace App\Controllers;

use App\Models\KoleksiModel;

class Admin extends BaseController
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
            'title' => 'Admin | Museum nasional Indonesia',
            'search' => true,
            'koleksi' => $this->KoleksiModel->getKoleksi()
        ];
        return view('admin/index', $data);
    }


    // detail
    public function detail($id)
    {
        $data = [
            'title' => 'Admin Detail |  Museum nasional Indonesia',
            'koleksi' =>  $this->KoleksiModel->find($id)
        ];

        if (empty($data['koleksi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Koleksi ' . $id . ' tidak ditemukan');
        }

        return view('admin/detail', $data);
    }


    // create
    public function create()
    {
        $data = [
            'title' => 'Admin Create |  Museum nasional Indonesia',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/create', $data);
    }


    // save
    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|is_unique[koleksi.nama]',
                'errors' => [
                    'required' => '{field} koleksi harus diisi.',
                    'is_unique' => '{field} sudah ada dan terdaftar! silahkan isi cek di daftar koleksi.'
                ]
            ],
            'desk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} koleksi harus diisi.',
                ]
            ],
            'wilayah' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} koleksi harus diisi.',
                ]
            ],
        ];


        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();


            return redirect()->back()->withInput()->with('validation', $validation);
        }


        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        // generate nama random untuj file
        $namaGambar = $fileGambar->getName();
        // pindahkan fike ke folder public/img
        $fileGambar->move('img/koleksi', $namaGambar);


        $data = [
            'nama' => $this->request->getVar('nama'),
            'desk' => $this->request->getVar('desk'),
            'wilayah' => $this->request->getVar('wilayah'),
            'created_by' => $this->request->getVar('created_by'),
            'gambar' => $namaGambar
        ];

        $this->KoleksiModel->save($data);

        // flash data
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/admin');
    }




    // edit
    public function edit($id)
    {
        $data = [
            'title' => 'Admin Edit |  Museum nasional Indonesia',
            'validation' => \Config\Services::validation(),
            'koleksi' => $this->KoleksiModel->getKoleksi($id)
        ];

        return view('admin/edit', $data);
    }



    // update
    public function update($id)
    {
        // pengecekan untuk rulw nama
        $koleksiLama = $this->KoleksiModel->getKoleksi($id);
        if ($koleksiLama['nama'] == $this->request->getVar('nama')) {
            $ruleNama = 'required';
        } else {
            $ruleNama = 'required|is_unique[koleksi.nama]';
        }

        $rules = [
            'nama' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => '{field} koleksi harus diisi.',
                    'is_unique' => '{field} sudah ada dan terdaftar! silahkan isi cek di daftar koleksi.'
                ]
            ],
            'desk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} koleksi harus diisi.',
                ]
            ],
            'wilayah' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} koleksi harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }


        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getName();
            $fileGambar->move('img/koleksi', $namaGambar);

            unlink('img/koleksi/', $this->request->getVar('gambarLama'));
        }


        $data = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'desk' => $this->request->getVar('desk'),
            'wilayah' => $this->request->getVar('wilayah'),
            'created_by' => $this->request->getVar('created_by'),
            'gambar' => $namaGambar
        ];

        $this->KoleksiModel->save($data);

        // flash data
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');

        return redirect()->to('/admin');
    }



    // delete
    public function delete($id)
    {
        // mencari gambar untuk pengahapusan
        $koleksi = $this->KoleksiModel->find($id);

        unlink('img/koleksi/' . $koleksi['gambar']);


        $this->KoleksiModel->delete($id);

        // flash data
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

        return redirect()->to('/admin');
    }


    // search
    public function search($title)
    {
        $keyword = $this->request->getVar('search');
        $koleksi = $this->KoleksiModel->search($keyword);

        $data = [
            'title' => $title,
            'search' => true,
            'koleksi' => $koleksi->findAll()
        ];

        if ($title == 'Daftar Koleksi | Museum nasional Indonesia') {
            return view('koleksi/index', $data);
        } else if ($title == 'Admin | Museum nasional Indonesia') {
            return view('admin/index', $data);
        }
    }




    // login
    // public function login()
    // {
    //     $data = [
    //         'title' => 'Admin Login | Museum nasional Indonesia',
    //     ];
    //     return view('admin/login', $data);
    // }


    // public function check()
    // {
    //     $username = $this->request->getVar('username');
    //     $password = $this->request->getVar('password');

    //     // d($this->request->getVar('remember_me'));

    //     if ($username == 'AdminMuseum' && $password == '123') {
    //         $session = \Config\Services::session();
    //         $newdata = [
    //             'login' => true,
    //             'username'  => 'Admin Museum',
    //         ];

    //         $session->set($newdata);


    //         $data = [
    //             'title' => 'Admin | Museum nasional Indonesia',
    //             'search' => true,
    //             'koleksi' => $this->KoleksiModel->getKoleksi()
    //         ];
    //         return view('admin/index', $data);

    //         $session->close();
    //     }

    //     $data = [
    //         'title' => 'Login | Museum nasional Indonesia',
    //         'gagal' => 'Username atau Password Salah! Silahkan Coba Lagi'
    //     ];

    //     return view('admin/login', $data);
    // }
}
