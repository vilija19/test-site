<?php

namespace Vilija19\Core\Interfaces;

interface ResponceInterface
{
    public function setOutput(string $view, $data = []): void;
}