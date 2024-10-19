<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('home/index', $data);
    }
    public function coba()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('home/coba');
    }
}
