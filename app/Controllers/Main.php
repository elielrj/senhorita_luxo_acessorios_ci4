<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index()
    {
        return view('main/Home', [
            'home' => 'nav-item active'
        ]);
    }

    public function exibirCarrinhoDeCompras()
    {
        return view('main/CarrinhoDeCompras');
    }

    public function exibirFinalizarPedido()
    {
        return view('main/FinalizarPedido');
    }

    public function exibirCriarContato()
    {
        return view('main/CriarContato', [
            'exibircriarcontato' => 'nav-item active'
        ]);
    }

    public function exibirBlog()
    {
        return view('main/Blog', [
            'blog' => 'nav-item active'
        ]);
    }

    public function exibirAbout()
    {
        return view('main/About', [
            'about' => 'nav-item active'
        ]);
    }

    public function exibirServices()
    {
        return view('main/Services', [
            'services' => 'nav-item active'
        ]);
    }

    public function exibirShop()
    {
        return view('main/Shop', [
            'shop' => 'nav-item active'
        ]);
    }
}


