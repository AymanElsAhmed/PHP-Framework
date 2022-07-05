<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

class ProductModel extends DbModel
{
    public string $sku;
    public string $name;
    public string $price;


    public function tableName(): string
    {
        return 'products';
    }

    public function add()
    {
        return $this->save();
    }
    public function viewData()
    {
        return $this->data();
    }

    public function rules(): array
    {
        return [
            'sku' => [self::RULE_REQUIRED],
            'name' => [self::RULE_REQUIRED],
            'price' => [self::RULE_REQUIRED]
        ];
    }
    public function attributes(): array
    {
        return ['sku', 'name', 'price'];
    }
}
