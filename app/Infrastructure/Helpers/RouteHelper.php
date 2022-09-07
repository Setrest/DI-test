<?php

namespace App\Infrastructure\Helpers;

final class RouteHelper
{
    final public static function routes(string $context, ?string $fileName = null): String
    {
        $fileName = $fileName ? "$fileName.php" : "{$context}.php";
        return base_path("routes/ApiContext/$context/$fileName");
    }
}