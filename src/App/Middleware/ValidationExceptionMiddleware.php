<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationExcetpion;

class ValidationExcetpionMiddleware implements MiddlewareInterface
{

    public function process(callable $next)
    {
        $next();
    }
}
