<?php

use app\core\Application;

class m01_initial
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS products(
            id INT AUTO_INCREMENT, 
            sku VARCHAR(255),
    		name VARCHAR(255),
    		price VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            primary key(id))
            ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE products;";
        $db->pdo->exec($sql);
    }
}
