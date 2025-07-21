<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'username' => session()->get('username') ?? 'Invité'
        ];

        return view('dashboard/index', $data);
    }
}
