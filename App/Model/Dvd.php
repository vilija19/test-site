<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

class Dvd extends Product
{
    /**
     * @var array Mandatory attribute IDs for this product type
     */
    protected $hasAttributesIDs = ['1'];

    public function __construct($data=[])
    {
        parent::__construct($data);
        $this->attributes();
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function create(array $data = []): void
    {
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->status = $data['status'] ?? 1;
        $this->quantity = $data['quantity'] ?? 999;
        $this->type = $data['type'];
        $this->setAttributes($data['attributes']);
        return;
    }

    public function setAttributes(array $attributes = []): void
    {
        foreach ($attributes as $attrName => $value) {
            $this->attributes[$attrName] = $value;
        }
    }

}
