<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

class Product extends ModelAbstract
{
    public function __construct()
    {
        $this->name = 'product';
        $this->storage = Application::getApp()->getComponent('storage');
    }


    
    public function write(int $id, array $data = []): void
    {
        $this->storage->write($this->name, $id, $data);
    }

    public function read(int $id): array
    {
        return $this->storage->read($this->name, $id);
    }

    public function readAll(): array
    {
        return $this->storage->readAll($this->name);
    }

    public function delete(int $id): void
    {
        $this->storage->delete($this->name, $id);
    }
    
}
