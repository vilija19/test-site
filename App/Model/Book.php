<?php

namespace Vilija19\App\Model;

use Vilija19\Core\Application;

class Book extends Product
{
    public function __construct()
    {
        $this->name = 'Book';
        $this->storage = Application::getApp()->getComponent('storage');
    }

    public function writeAttributes(int $id, array $data = []): void
    {
        $this->storage->write($this->name, $id, $data);
    }
}
