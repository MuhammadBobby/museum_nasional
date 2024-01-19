<?php

namespace App\Models;

use CodeIgniter\Model;

class KoleksiModel extends Model
{
    protected $table      = 'koleksi';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'desk', 'gambar', 'created_by', 'wilayah'];

    public function getKoleksi($id = false)
    {
        if ($id == false) {
            // jika id gada tampilin semua
            return $this->findAll();
        }

        // jika ada id tampilim detail
        return $this->where(['id' => $id])->first();
    }

    // function search
    public function search($keyword)
    {
        return $this->table('koleksi')->like('nama', $keyword)->orLike('wilayah', $keyword);
    }
}
