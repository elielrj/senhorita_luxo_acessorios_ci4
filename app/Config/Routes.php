<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Shop;
use App\Controllers\About;
use App\Controllers\Services;
use App\Controllers\Blog;
use App\Controllers\ContatoController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('/shop', 'Shop::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->get('/blog', 'Blog::index');
$routes->get('/contato', 'ContatoController::index');
$routes->get('/cart', 'Cart::index');
$routes->get('/checkout', 'Checkout::index');
$routes->get('/thankyou', 'Thankyou::index');
$routes->post('/enviar-mensagem', 'ContatoController::enviarMensagem');
$routes->post('/inscrever-newsletter', 'NewsletterController::criarNewsletter');
$routes->get('/mensagem-enviada', 'ContatoController::mensagemEnviada');


