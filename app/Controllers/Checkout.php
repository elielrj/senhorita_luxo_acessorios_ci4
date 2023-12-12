<?php

namespace App\Controllers;

class Checkout extends BaseController
{
    public function index(): string
    {
        return view('checkout');
    }
}
