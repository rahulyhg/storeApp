<?php

namespace comrade\Controllers;

use comrade\Basket\Basket;
use comrade\Models\Product;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class IndexController
{
    public function index(Request $request, Response $response, Twig $view, Product $products, Basket $basket)
    {
        $allProducts = $products->getAll();
        return $view->render($response, 'index.twig', ['products' => $allProducts]);
    }
}