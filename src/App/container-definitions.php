<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database};
use App\Config\Paths;
use App\Services\ValidatorService;

return [
    TemplateEngine::class => fn () => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService(),
    Database::class => fn () => new Database(
        driver: $_ENV['DB_DRIVER'],
        config: [
            'host' => $_ENV['DB_HOTS'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME']
        ],
        username: $_ENV['DB_USER'],
        password: $_ENV['DB_PASS'],
    ),
];
