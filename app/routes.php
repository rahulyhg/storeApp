<?php

$app->get('/', ['comrade\Controllers\IndexController', 'index'])->setName('home');

$app->get('/products/{slug}', ['comrade\Controllers\ProductController', 'get'])->setName('product.get');

$app->get('/cart', ['comrade\Controllers\CartController', 'index'])->setName('cart.index');