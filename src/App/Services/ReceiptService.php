<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;


class ReceiptService
{


    public function __construct(private Database $db)
    {
    }

    public function validateFile(?array $file)
    {

        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            throw new ValidationException(['receipt' => ['Failed to upload file']]);
        }

        $maxFileSizeMB = 3;

        if ($file['size'] * 1024 * 1024 > $maxFileSizeMB) {
            throw new ValidationException(['receipt' => ['File uploaded is too Large']]);
        }

        $originalFileName = $file['name'];

        if (!preg_match('/^[A-za-z0-9\s._-]+$/', $originalFileName)) {
            throw new ValidationException(['receipt' => ['Invalid File Name']]);
        }

        $clientMimeType = $file['type'];
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];

        if (!in_array($clientMimeType, $allowedMimeTypes)) {
            throw new ValidationException(['receipt' => ['Invalid File Type']]);
        }
    }
}
