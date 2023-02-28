<?php

namespace Vilija19\Core\Interfaces;
/**
 * Interface for storage
 */
interface StorageInterface
{
    public function get(int $id): object;
    public function getByField(string $field, string $value): object;
    public function create(array $data): int;
    public function delete(int $id): void;
    public function all(object $stmt): array;
    public function one(object $stmt): array;
    public static function getInstance(array $arguments = []): object;
    public function setStorageObject(string $table): void;
}