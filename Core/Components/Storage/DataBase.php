<?php
/**
 * роутер
 * 
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Storage;

use \Vilija19\Core\Exceptions\ConnectToSrorageException;

/**
 * Класс  DataBase
 */
class DataBase implements \Vilija19\Core\Interfaces\StorageInterface
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
    protected $pdo;
    /**
     * Свойство хранит экземпляр класса DataBase
     * @var object 
     * @access protected
     */
    protected static $instance;
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
            $this->pdo = new \PDO($connectString, $arguments['user'], $arguments['password']);
        } catch (\Throwable $th) {
            throw new ConnectToSrorageException("Error connecting to DataBase", 1);
        }
    }

    public static function getInstance(array $arguments = [])
    {
        if (self::$instance === null) {
            self::$instance = new self($arguments);
        }
        return self::$instance;
    }

    public function setStorageObject(string $table): void
    {
        $this->table = $table;
    }

    public function getAll(): array
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getOne($id): array
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute( ['id' => $id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function get($id): array
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute( ['id' => $id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

}
