<?php

namespace  Vilija19\Core\Interfaces;

interface ProductInterface
{
    public function create(array $data = []): void;
    public function setAttributes(array $attributes = []): void;
    public function getAttributes(): array;
    public static function massDelete(array $ids = []): void;
    public static function delete(int $id): void;
}