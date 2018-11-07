<?php

namespace App\Support;

use App\Models\Website;

class AvailableModels
{
    /**
     * List with all available models to discover available fields
     * that will be used as a Report Meta..
     *
     * @var array
     */
    private static $models = [
        'website' => Website::class
    ];

    /**
     * @return array
     */
    public static function get()
    {
        return self::$models;
    }
}
