<?php

namespace Vilija19\App\Model;

abstract class ModelAbstract
{
    protected $name;
    protected $storage;

    abstract public function write(int $id, array $data = []): void;
    abstract public function read(int $id): array;
    abstract public function readAll(): array;
    abstract public function delete(int $id): void;

}