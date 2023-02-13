<?php
/**
 * роутер
 * 
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components;

use \Vilija19\Core\Exceptions\ConnectToSrorageException;

/**
 * Класс  DataBase
 */
class DataBase
{
    /**
     * Свойство хранит массив ошибок
     * @var array 
     * @access protected
     */
    protected $errors;
    /**
     * Свойство хранит экземпляр класса PDO
     * @var PDO 
     * @access protected
     */
    protected static $pdo;
    /**
     * Свойство хранит имя таблицы
     * @var string 
     * @access protected
     */
    protected $table;

    private function __construct(array $arguments = [])
    {
        $this->errors = [];
        $connectString = 'mysql:host=' . $arguments['host'] . ';dbname=' . $arguments['dbname'] . ';charset=utf8';
        try {
            self::$pdo = new \PDO($connectString, $arguments['user'], $arguments['password']);
        } catch (\Throwable $th) {
            throw new ConnectToSrorageException("Error connecting to DataBase", 1);
        }
    }

    public static function getInstance(array $arguments = [])
    {
        if (self::$pdo === null) {
            self::$pdo = new self($arguments);
        }
        return self::$pdo;
    }

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

}
