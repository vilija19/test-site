<?php

namespace Vilija19\Core\Interfaces;

interface ResponceInterface
{
    public function setOutput(string $view, $data = []): void;
    public function redirect(string $url): void;
    public function output(): void;
}