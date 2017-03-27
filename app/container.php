<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;
use function Di\get;

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
    }
];