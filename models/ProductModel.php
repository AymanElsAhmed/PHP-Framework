<?php

namespace app\models;

use app\core\Model;

class ProductModel extends Model
{
    public int $sku;
    public string $name;
    public int $price;


    public function add(){
        echo "Adding product to database";
    }
}