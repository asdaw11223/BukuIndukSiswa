<?php

namespace App\Controllers;

class Catatan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Catatan Siswa',
        ];

        return view('rapor/catatan', $data);
    }
}
