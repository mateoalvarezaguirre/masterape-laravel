<?php

namespace Src\Shared\Helpers;

abstract class FileHelper
{
    public static function getExtensionFromName(string $fileName): string
    {
        $nameArray = explode('.', $fileName);

        return end($nameArray);
    }
}
