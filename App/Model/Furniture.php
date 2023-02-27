<?php

namespace Vilija19\App\Model;

class Furniture extends Product
{
    public function __construct($data=[])
    {
        parent::__construct($data);
        $this->type = 'Furniture';
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
