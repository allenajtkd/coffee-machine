<?php

namespace Pdpaola\CoffeeMachine\Console;

class MysqlPdoClient
{
    private static $pdo;

    public static function getPdo(): \PDO
    {
        if (!(self::$pdo instanceof \PDO)) {
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $dsn = "mysql:host=coffee-machine.mysql;dbname=coffee_machine;charset=utf8";
            try {
                self::$pdo = new \PDO($dsn, 'coffee_machine', 'coffee_machine', $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        return self::$pdo;
    }
}