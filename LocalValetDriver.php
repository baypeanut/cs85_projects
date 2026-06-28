<?php

use Valet\Drivers\LaravelValetDriver;

class LocalValetDriver extends LaravelValetDriver
{
    public function frontControllerPath(string $sitePath, string $siteName, string $uri): ?string
    {
        $publicFile = $sitePath.'/public'.$uri;

        if (pathinfo($uri, PATHINFO_EXTENSION) === 'php' && is_file($publicFile)) {
            return $publicFile;
        }

        return parent::frontControllerPath($sitePath, $siteName, $uri);
    }
}
