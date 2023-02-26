<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

/**
 * @property int $id // this is the product_id
 * @property int $attribute_id
 * @property string $value
 * @property int  $is_serialized
 */
class ProductAttribute extends ModelAbstract
{
    protected $storageObjectName = 'product_attribute';
    protected $product_id;
    protected $attribute_id;
    protected $name;
    protected $value;
    protected $is_serialized;
    protected $attribute;
    
    public function __construct($data=[])
    {
        $this->product_id = $data['id'];
        $this->attribute_id = $data['attribute_id'];
        $this->value = $data['value'];
        $this->is_serialized = $data['is_serialized'];
        $this->attribute();
        $this->name = $this->attribute->name;          
    }

    protected function attribute()
    {
        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Attribute::class);
        $this->attribute = $orm->get($this->attribute_id)->one();
    }

    public function create(array $data = []): void
    {
        $id = $this->orm->create($this->name, $data);
    }
    
    public function update(int $id, array $data = []): void
    {
        $this->orm->write($this->name, $id, $data);
    }

    public function get(int $product_id): array
    {
        return $this->orm->get($product_id);
    }

    public function getAll(): array
    {
        $products = $this->orm->getAll();
        return $products;
    }

    public function delete(int $id): void
    {
        $this->orm->delete($this->name, $id);
    }

}
