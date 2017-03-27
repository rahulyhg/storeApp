<?php

$app->get('/', ['comrade\Controllers\IndexController', 'index'])->setName('home');