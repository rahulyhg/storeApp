<?php

use function Di\get;
use Slim\Views\Twig;
use comrade\Models\Product;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;


return [
    Twig::class => function(ContainerInterface $c){
        $twig = new Twig(implode(DIRECTORY_SEPARATOR, [APP_DIR, 'app', 'Views']), [
            'cache' => false
        ]);

        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));

        return $twig;
    },

    Product::class => function(ContainerInterface $c){
        return new Product;
    }
    
];