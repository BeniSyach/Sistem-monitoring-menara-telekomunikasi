<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin - siMENTEL-Sergai'
        ];

        return view('admin/dashboard/dashboard', $data);
    }
}
