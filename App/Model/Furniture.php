<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

class Furniture extends Product
{
    /**
     * @var array Mandatory attribute IDs for this product type
     */
    protected $hasAttributesIDs = ['2'];

    public function __construct($data=[])
    {
        parent::__construct($data);
        $this->attributes();
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
}
