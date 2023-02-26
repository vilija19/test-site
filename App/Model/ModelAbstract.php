<?php

namespace Vilija19\App\Model;

abstract class ModelAbstract
{
    protected $name;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    abstract public function create(array $data = []): void;
    abstract public function update(int $id, array $data = []): void;
    abstract public function get(int $id): array;
    abstract public function delete(int $id): void;

}