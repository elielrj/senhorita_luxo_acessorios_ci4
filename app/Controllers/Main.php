<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index(): string
    {
        return view('home', [
            'home' => 'nav-item active'
        ]);
    }
}
