<?php
/**
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Orm;

use Vilija19\Core\Application;

/**
 * Класс  SimpleOrm
 */
class SimpleOrm 
{
    protected $storage;
    protected $storageObjectName;
    protected $model;

    public function __construct()
    {
        $this->storage = Application::getApp()->getComponent('storage');
    }

    public function setModel($model)
    {
        $this->model = $model;
        $this->storageObjectName = $this->inspectClass($model)['properties']['storageObjectName'];
        $this->storage->setStorageObject($this->storageObjectName);
    }

    public function getAll(): array
    {
        $objects = [];
        $items = $this->storage->getAll();
        foreach ($items as $item) {
            $objects[] = $this->createObject($item);
        }
        return $objects;
    }

    public function getMany(int $id): array
    {
        $objects = [];
        $items = $this->storage->get($id);
        foreach ($items as $item) {
            $objects[] = $this->createObject($item);
        }
        return $objects;
    }

    public function get(int $id): object
    {
        $object = [];
        $item = $this->storage->getOne($id);
        $object = $this->createObject($item);

        return $object;
    }
    public function getByField(string $field, $value): object
    {
        $object = [];
        $item = $this->storage->getByField($field, $value);
        $object = $this->createObject($item);

        return $object;
    }

    protected function createObject(array $data = []): object
    {
        $object = [];
        if (isset($data['type'])) {
            $model = 'Vilija19\\App\\Model\\' . $data['type'];
        }else {
            $model = $this->model;
        }
        $object = new $model($data);
        
        return $object;
    }
    /**
     * Inspect class. Uses for finding storage object name (table name or file name)
     * @param none
     * @return array
     */
    protected function inspectClass(): array
    {   
        $classInfo = [];
        $reflectionClass = new \ReflectionClass($this->model);
        $classInfo['properties'] = $reflectionClass->getDefaultProperties();
        return $classInfo;
    }
    
}
