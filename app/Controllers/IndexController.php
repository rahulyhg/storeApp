<?php

namespace comrade\Controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class IndexController
{
    public function index(Request $request, Response $response, Twig $view)
    {
        return $view->render($response, 'index.twig');
    }
}