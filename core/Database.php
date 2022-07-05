<?php

namespace app\core;

use PDO;

class Database
{
    public PDO $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['dsn'];
        $user = $config['user'];
        $password = $config['password'];
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $file = scandir(Application::$ROOT_DIR . '/migrations');

        $toApplyMigrations = array_diff($file, $appliedMigrations);

        $newMigrations = [];
        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            echo 'Apllying migrate from db folder' . PHP_EOL;
            $instance->up();
            echo  'migrate from db folder has been done' . PHP_EOL;
            $newMigrations[] = $migration;
            // echo "<pre>";
            // var_dump($className);
            // echo "</pre>";
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            echo "All migrations Apllied";
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
            id INT AUTO_INCREMENT, 
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            primary key(id))
            ENGINE=INNODB;");
    }
    public function getAppliedMigrations()
    {
        $statment = $this->pdo->prepare('SELECT migration FROM migrations');
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $newMigrations)
    {
        $str = implode(",", array_map(fn ($m) => "('$m')", $newMigrations));
        $statment = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
        $str
        ");
        $statment->execute();
    }
}
