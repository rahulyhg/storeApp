<?php

namespace comrade\Models;


class Product
{

    public function getAll(){
        return \ORM::forTable('products')->findMany();
    }
    public function getProductBySlug($slug)
    {
        return \ORM::forTable('products')->where('slug', $slug)->findOne();
    }
}