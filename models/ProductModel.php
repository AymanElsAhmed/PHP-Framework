<?php

namespace app\models;

use app\core\Model;

class ProductModel extends Model
{
    public string $sku;
    public string $name;
    public string $price;


    public function add(){
        echo "Adding product to database";
    }

    public function rules(): array
    {
       return [
            'sku' => [self::RULE_REQUIRED] ,
            'name' => [self::RULE_REQUIRED],
            'price' =>[self::RULE_REQUIRED]
       ];
    }
}