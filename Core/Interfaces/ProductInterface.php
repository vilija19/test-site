<?php

namespace  Vilija19\Core\Interfaces;

interface ProductInterface
{
    public  function write(int $id, array $data = []): void;
    public  function read(int $id): array;
    public  function readAll(): array;
    public  function delete(int $id): void;
}