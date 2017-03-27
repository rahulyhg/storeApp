<?php

namespace comrade;

use DI\ContainerBuilder;
use DI\Bridge\Slim\App as DiBridge;

class App extends DiBridge
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions([
            'setting.displayErrorDetails' => true,
        ]);

        $builder->addDefinitions(APP_DIR.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'container.php');
    }
}