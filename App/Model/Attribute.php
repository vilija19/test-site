<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

/**
 * @property int $id
 * @property string $name
 * @property string $value_unit
 * @property int $sort_order
 */
class Attribute extends ModelAbstract
{
    protected $storageObjectName = 'attribute';
    protected $id;
    protected $name;
    protected $value_unit;
    protected $sort_order;
    
    public function __construct($data=[])
    {
        $this->id = $data['id'];
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->value_unit = $data['value_unit'];
        $this->sort_order = $data['sort_order'];       
    }


    public function create(array $data = []): void
    {
        $id = $this->orm->create($this->name, $data);
    }
    
    public function update(int $id, array $data = []): void
    {
        $this->orm->write($this->name, $id, $data);
    }

    public function get(int $id): array
    {
        return $this->orm->read($this->name, $id);
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
