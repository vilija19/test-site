<?php

namespace Vilija19\Core\Interfaces;

interface TemplateInterface
{
    public function render(string $view, array $data = []): string;
}