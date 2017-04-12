<?php

namespace comrade\Basket;


use comrade\Basket\Exceptions\QuantityExceededException;
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

    public function add(Product $product, $quantity)
    {
        if($this->has($product)){
            $quantity = $this->get($product)['quantity'] +$quantity;
        }




    }


    public function update(Product $product, $quantity)
    {
        if($this->product->hasStock($product->id, $quantity)){
            throw new QuantityExceededException;
        }

        if($quantity === 0){
            $this->remove($product);
            return;
        }

        $this->storage->set($product->id, [
            'product_id' => (int )$product->id,
            'quantity' => (int) $quantity,
        ]);
    }

    public function remove(Product $product)
    {
        $this->storage->unset($product);
    }

    public function has(Product $product)
    {
        return $this->storage->exists($product->id);
    }

    public function get(Product $product)
    {
        return $this->storage->get($product->id);
    }

    public function clear()
    {
        $this->storage->clear();
    }

    public function all()
    {
        $ids = [];
        $items = [];

        foreach ($this->storage->all() as $product){
            $ids = $product['product_id'];
        }
        
        $products = $this->product->getByIds($ids);

        foreach ($products as $product){
            $product->quantity = $this->get($product)['quantity'];
            $items = $product;
        }

        return $items;
    }

    public function itemCount()
    {
        return count($this->storage);
    }
}