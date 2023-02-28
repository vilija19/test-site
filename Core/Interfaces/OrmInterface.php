<?php

namespace Vilija19\Core\Interfaces;

interface OrmInterface
{
    public function setModel(string $model): void;
    public function save(array $data): int;
    public function update(int $id, array $data): void;
    public function get(int $id): object;
    public function getByField(string $field, string $value): object;
    public function delete(int $id): void;
    public function one(): ?object;
    public function all(): array;
}