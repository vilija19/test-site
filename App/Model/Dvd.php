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
        $this->type = 'Dvd';
        $this->attributes();
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }



}
