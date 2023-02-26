<?php
/**
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 */

namespace Vilija19\Core\Components\Orm;

use Vilija19\App\Model\Product;
use Vilija19\Core\Application;

/**
 * Класс  SimpleOrm
 */
class SimpleOrm 
{
    /**
     * Storage object 
     * @var object
     */
    protected $storage;
    /**
     * Storage object name (table name or file name)
     * @var string
     */
    protected $storageObjectName;
    /**
     * Model name
     * @var string
     */
    protected $model;
    /**
     * Not fetched data from storage
     * @var object
     */
    protected $data;

    public function __construct()
    {
        $this->storage = Application::getApp()->getComponent('storage');
    }
    /**
     * Prepare Orm for work with model
     *
     * @param string $model
     * @return void
     */
    public function setModel($model): void
    {
        $this->model = $model;
        $this->storageObjectName = $this->inspectClass($model)['properties']['storageObjectName'];
        $this->storage->setStorageObject($this->storageObjectName);
    }
    public function create(Product $product): void
    {
        // Create product
        $data = [];
        $data['sku'] = $product->sku;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['status'] = $product->status;
        $data['quantity'] = $product->quantity;
        $data['type'] = $product->type;
        $product->id = $this->storage->create($data);

        // Prepare product attributes
        $data = [];
        $this->setModel(\Vilija19\App\Model\Attribute::class);
        foreach ($product->attributes as $attrName => $attributeData) {
            $attribute = $this->getByField('name', ucfirst($attrName))->one();
            $attr['id'] = $product->id;
            $attr['attribute_id'] = (int)$attribute->id;
            $attr['value'] = $attributeData;
            $attr['is_serialized'] = 0;
            $data[] = $attr;
        }
        // Create product attributes
        $this->setModel(\Vilija19\App\Model\ProductAttribute::class);
        foreach ($data as $attribute) {
            $this->storage->create($attribute);
        }
        return;
    }
    /**
     * Get item/items by id. If id is not set, get all items
     *
     * @param int $id
     * @return object
     */
    public function get(int $id = 0): object
    {
        $this->data = $this->storage->get($id);

        return $this;
    }
    /**
     * Get item/items by field. If value is not set, get all items
     *
     * @param string $field
     * @param string $value
     * @return object
     */
    public function getByField(string $field, string $value): object
    {
        $this->data = $this->storage->getByField($field, $value);

        return $this;
    }
    /**
     * Create object from data
     *
     * @param array $data
     * @return object,null
     */
    private function createObject(array $data = []): ?object
    {
        $object = null;

        if (empty($data)) {
            return $object;
        }

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

    /**
     * Get one item
     *
     * @param void
     * @return object,null
     */
    public function one()
    {
        $item = $this->storage->one($this->data);
        return $this->createObject($item);
    }
    /**
     * Get all items
     *
     * @param void
     * @return array
     */
    public function all()
    {
        $objects = [];
        $items = $this->storage->all($this->data);
        foreach ($items as $item) {
            $objects[] = $this->createObject($item);
        }
        return $objects;        
    }    
    
}
