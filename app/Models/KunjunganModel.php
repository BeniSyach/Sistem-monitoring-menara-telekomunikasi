<?php

namespace App\Models;

use CodeIgniter\Model;

class KunjunganModel extends Model
{
    protected $table      = 'tab_kunjungan';
    protected $allowedFields = ['ip', 'os', 'browser', 'date_create'];
}
