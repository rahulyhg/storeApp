<?php

use function Di\get;
use Slim\Views\Twig;
use comrade\Models\Product;
use comrade\Basket\Basket;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;
use comrade\Support\Storage\SessionStorage;
use comrade\Support\Storage\Contracts\StorageInterface;

return [
    StorageInterface::class => function(ContainerInterface $c){
        return new SessionStorage('cart');
    },
    Twig::class => function(ContainerInterface $c){
        $twig = new Twig(implode(DIRECTORY_SEPARATOR, [APP_DIR, 'app', 'Views']), [
            'cache' => false
        ]);

        $twig->addExtension(new TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));
        $twig->addExtension(new Twig_Extension_Debug());

        return $twig;
    },

    Product::class => function(ContainerInterface $c){
        return new Product;
    },
    Basket::class => function(ContainerInterface $c){
        return new Basket(
            $c->get(SessionStorage::class),
            $c->get(Product::class)
        );
    }
    
];