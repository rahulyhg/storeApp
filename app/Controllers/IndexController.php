<?php

namespace comrade\Controllers;
use DI\ContainerBuilder;
use DI\Bridge\Slim\App as DiBridge;

class IndexController extends DiBridge
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions([
            'setting.displayErrorDetails' => true,
        ]);
    }
}