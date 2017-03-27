<?php

namespace comrade\Models;


class Product
{
    public function getAll(){
        return \ORM::forTable('products')->findMany();
    }
}