<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\ContatoController;

/**
 * @var RouteCollection $routes
 */

//CONTATO
$routes->post('/enviar-mensagem', 'ContatoController::enviarMensagem');
$routes->get('/mensagem-enviada', 'ContatoController::mensagemEnviada');

//MAIN
$routes->get('/', 'Main::index');
$routes->get('/contato', 'Main::exibirCriarContato');
$routes->get('/shop', 'Main::exibirShop');
$routes->get('/about', 'Main::exibirAbout');
$routes->get('/services', 'Main::exibirServices');
$routes->get('/blog', 'Main::exibirBlog');
$routes->get('/carrinho', 'Main::exibirCarrinhoDeCompras');
$routes->get('/finalizar-pedido', 'Main::exibirFinalizarPedido');

//NEWSLETTER
$routes->post('/inscrever-newsletter', 'NewsletterController::criarNewsletter');

//PEDIDO
$routes->get('/criar-pedido', 'PedidoController::criarPedido');


