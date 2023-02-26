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
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->status = $data['status'] ?? 1;
        $this->quantity = $data['quantity'] ?? 999;
        $this->type = $data['type'];
        $id = $this->orm->create($data);
    }
    
    public function update(int $id, array $data = []): void
    {
        $this->orm->write($this->name, $id, $data);
    }

    public function get(int $id): array
    {
        return $this->orm->get($id);
    }

    public function getAll(): array
    {
        $products = $this->orm->getAll();
        return $products;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $attributes = []): void
    {
        foreach ($this->attributes as $attrName => $value) {
            if (isset($attributes[$attrName])) {
                $this->attributes[$attrName] = $value;
            }
        }
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

    public function delete(int $id): void
    {
        $this->orm->delete($this->name, $id);
    }

}
