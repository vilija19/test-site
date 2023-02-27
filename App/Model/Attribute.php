<?php

namespace Vilija19\App\Model;

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

}
