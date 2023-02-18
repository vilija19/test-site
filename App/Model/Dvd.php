<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

class Dvd extends Product
{
    protected $attributesS = [
        'size'  => '',
    ];

    public function __construct($data=[])
    {
        parent::__construct($data);

        $attributes = $this->attributes();
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
