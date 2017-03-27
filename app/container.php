<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;

return [
    'router' => get(Slim\Route::class),
    Twig::class => function(ContainerInterface $c){
        $twig = new Twig(implode(DIRECTORY_SEPARATOR, [APP_DIR, 'resources', 'views']), [
            'cache' => false
        ]);

        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));
    }
];