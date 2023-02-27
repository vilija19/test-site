<?php

namespace Vilija19\App\Model;

class Book extends Product
{

    public function __construct($data=[])
    {
        parent::__construct($data);
        $this->type = 'Book';
        $this->attributes();
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

}
