<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

/**
 * Class ProductAttribute to link product with attribute
 * 
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
    /**
     * Get attribute object for this product attribute
     * 
     * @return void
     */
    protected function attribute()
    {
        $orm = application::getApp()->getComponent('orm');
        $orm->setModel(\Vilija19\App\Model\Attribute::class);
        $this->attribute = $orm->get($this->attribute_id)->one();
    }

}
