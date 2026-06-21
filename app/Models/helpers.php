<?php

use App\Models\Content;

if (!function_exists('content')) {
    function content($key, $default = null)
    {
        try {
            $data = Content::where('key', $key)->first();
            return $data ? $data->value : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }
}