<?php

namespace comrade\Controllers;

use comrade\Models\Product;
use Slim\Router;
use Slim\Views\Twig;
use comrade\Basket\Basket;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CartController
{
    protected $basket;
    protected $product;

    public function __construct(Basket $basket, Product $product)
    {
        $this->basket = $basket;
        $this->product = $product;
    }

    public function index(Request $request, Response $response, Twig $view)
    {
        return $view->render($response, 'cart/index.twig');
    }

    public function add($slug, $quantity, Request $request, Response $response, Router $router )
    {
        $product = $this->product->get($slug);

        if(!$product){
            return $response->withRedirect($router->pathFor('home'));
        }
        die('add');

    }
}