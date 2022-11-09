<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table      = 'tab_kritiksaran';
    protected $allowedFields = ['id', 'nama', 'email', 'judul', 'pesan'];
}
