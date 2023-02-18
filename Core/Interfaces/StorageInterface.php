<?php

namespace Vilija19\Core\Interfaces;

interface StorageInterface
{
    public static function getInstance(array $arguments = []);
    public function setStorageObject(string $table): void;
    public function getAll(): array;
}