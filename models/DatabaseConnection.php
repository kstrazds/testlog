<?php
namespace models;

use PDO;
use models\DatabaseConfig;

abstract class DatabaseConnection
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . DatabaseConfig::DB_HOST . ';dbname=' . DatabaseConfig::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, DatabaseConfig::DB_USER, DatabaseConfig::DB_PASSWORD);
        }

        return $db;
    }
}