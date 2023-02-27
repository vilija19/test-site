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

    protected function mutateAttribures(): void
    {
        if (isset($this->attributes['dimension'])) {
            $attribute = implode('x', $this->attributes['dimension']);
            $this->attributes['dimension'] = $attribute;
        }
    }
}
