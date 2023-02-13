<?php

namespace Vilija19\Core\Interfaces;

interface RouteInterface
{
    public function route(string $uri): callable;
}