<?php
/**
 * Created by comrade
 */

session_start();

define('ROOT_DIR', __DIR__);
define('APP_DIR', dirname(__DIR__));

require_once implode(DIRECTORY_SEPARATOR, [APP_DIR, 'vendor', 'autoload']).'.php';

ORM::configure(array(
    'configure_string' => 'mysql:host=localhost;dbname=storeapp',
    'username'         => 'root',
    'password'         => '',
    'driver_options'   => array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    )
));



$app = new comrade\App();

require_once implode(DIRECTORY_SEPARATOR, [APP_DIR, 'app', 'routes']).'.php';

$app->run();