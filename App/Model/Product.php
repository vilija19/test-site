<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;
use \Vilija19\Core\Exceptions\GetComponentException;


/**
 * @property int $id
 * @property string $sku
 * @property string $name
 * @property float $price
 * @property int $status
 * @property int $quantity
 * @property string $type
 */
abstract class Product extends ModelAbstract
{
    protected $storageObjectName = 'product';
    protected $id;
    protected $name;
    protected $sku;
    protected $price;
    protected $status;
    protected $quantity;
    protected $type;
    protected $attributes = [];
    
    public function __construct($data=[])
    {
        // if (!$data['sku'] || !$data['name']) {
        //     throw new GetComponentException("Not enought data", 1);
        // }
        $this->id = $data['id'] ?? null;
        $this->sku = $data['sku'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->price = $data['price'] ?? 0.00;
        $this->status = $data['status'] ?? 0;
        $this->quantity = $data['quantity'] ?? 0;
        $this->type = $data['type'] ?? '';        
    }


    public function create(array $data = []): void
    {
        if (isset($data['attributes'])) {
            $this->attributes = $data['attributes'];
            unset($data['attributes']);
        }
            
        // Create product
        $orm = application::getApp()->getComponent('orm');
        $orm->setModel($this);       
        $this->id = $orm->save($data);

        // Prepare product's attributes
        $data = [];
        $orm->setModel(\Vilija19\App\Model\Attribute::class);
        $this->mutateAttribures();
        foreach ($this->attributes as $attrName => $attributeData) {
            $attribute = $orm->getByField('name', ucfirst($attrName))->one();
            $attr['id'] = $this->id;
            $attr['attribute_id'] = (int)$attribute->id;
            $attr['value'] = $attributeData;
            $attr['is_serialized'] = 0;
            $data[] = $attr;
        }
        // Create product attributes
        $orm->setModel(\Vilija19\App\Model\ProductAttribute::class);
        foreach ($data as $attribute) {
            $orm->save($attribute);
        }
        return;
    }

    protected function mutateAttribures(): void
    {
        return;
    }

    public function setAttributes(array $attributes = []): void
    {
        foreach ($attributes as $attrName => $value) {
            $this->attributes[$attrName] = $value;
        }
    }
    
    public function update(int $id, array $data = []): void
    {
        $this->orm->write($this->name, $id, $data);
    }

    public function get(int $id): array
    {
        return $this->orm->get($id);
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function attributes(): void
    {
        if (!$this->id) {
            return;
        }
        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\ProductAttribute::class);
        foreach ($orm->get($this->id)->all() as $attribute) {
            $this->attributes[$attribute->name] = $attribute; 
        }
    }

    public static function massDelete(array $ids = []): void
    {
        foreach ($ids as $id) {
            self::delete($id);
        }
    }

    public function delete(int $id): void
    {
        // Delete product
        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Product::class);  
        $orm->delete($id);
        // Delete product attributes
        $orm->setModel(\Vilija19\App\Model\ProductAttribute::class);
        $orm->delete($id);
    }

}
