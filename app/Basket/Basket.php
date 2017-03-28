<?php

namespace comrade\Basket;


use comrade\Models\Product;
use comrade\Support\Storage\Contracts\StorageInterface;


class Basket
{
    protected $storage;
    protected $product;
    public function __construct(StorageInterface $storage, Product $product)
    {
        $this->storage = $storage;
        $this->product = $product;
    }
}