<?php

namespace Vilija19\App\Model;

class Dvd extends Product
{

    public function __construct($data=[])
    {
        parent::__construct($data);
        $this->type = 'Dvd';
        $this->attributes();
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }



}
