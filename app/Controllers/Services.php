<?php

namespace App\Controllers;

class Services extends BaseController
{
    public function index(): string
    {
        return view('services', [
            'services' => 'nav-item active'
        ]);
    }
}
