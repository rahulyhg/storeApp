<?php
/**
 * Created by comrade
 */
session_start();
define('ROOT_DIR', __DIR__);
define('APP_DIR', dirname(__DIR__));

require_once implode(DIRECTORY_SEPARATOR, [APP_DIR, 'vendor', 'autoload']).'.php';

