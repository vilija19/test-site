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

    protected $result;

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

    public function get($id): object
    {
        $sql = 'SELECT * FROM ' . $this->table;
        if ($id) {
            $sql .= ' WHERE id = :id';
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute( ['id' => $id]);
        return $stmt;
    }

    public function getByField(string $field, $value): object
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute( ['value' => $value]);

        return $stmt;
    }

    public function delete($id): void
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute( ['id' => $id]);
    }

    public function create(array $data): int
    {
        $sql = 'INSERT INTO ' . $this->table . ' (';
        $sql .= implode(', ', array_keys($data));
        $sql .= ') VALUES (';
        $sql .= ':' . implode(', :', array_keys($data));
        $sql .= ')';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $id = $this->pdo->lastInsertId();
        return $id;
    }

    public function one($stmt): array
    {
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!is_array($result)) {
            $result = [];
        }
        return $result;
    }

    public function all($stmt): array
    {
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (!is_array($result)) {
            $result = [];
        }
        return $result;        
    }

}
