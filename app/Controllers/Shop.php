<?php

namespace App\Controllers;

class Shop extends BaseController
{
    public function index(): string
    {
        return view('shop', [
            'shop' => 'nav-item active'
        ]);
    }
}
