<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statment = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") Values (" . implode(',', $params) . ") ");
        foreach ($attributes as $attribute) {
            $statment->bindValue(":$attribute", $this->{$attribute});
        }
        $statment->execute();
        return true;
    }
    public function data()
    {
        $tableName = $this->tableName();
        $statment = Application::$app->db->pdo->query("SELECT * FROM $tableName");
        $products = $statment->fetchAll();
        return $products;
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
