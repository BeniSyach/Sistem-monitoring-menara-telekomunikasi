<?php

namespace App\Models;

use CodeIgniter\Model;

class RetribusiModel extends Model
{
    protected $table      = 'tab_retribusi';
    protected $allowedFields = ['judul', 'tahun', 'detail_retribusi', 'slug'];

    public function ambil_slug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function hapus_retribusi($slug)
    {
        return $this->where(['slug' => $slug])->delete();
    }
}
