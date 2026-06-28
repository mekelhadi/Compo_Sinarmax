<?php

use App\Models\Content;
use Illuminate\Support\Facades\Storage;

if (!function_exists('content')) {
    function content($key, $default = null)
    {
        try {
            $locale = app()->getLocale();
            $localeKey = $key . '_' . $locale;
            $data = Content::where('key', $localeKey)->first();
            if ($data && $data->value) {
                return $data->value;
            }
            $data = Content::where('key', $key)->first();
            return $data ? $data->value : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }
}

if (!function_exists('content_image')) {
    function content_image($key, $default = null)
    {
        $val = content($key, $default);
        if (!$val) return $default;

        if (str_starts_with($val, 'data:image/')) {
            return $val;
        }
        if (str_starts_with($val, 'http://') || str_starts_with($val, 'https://')) {
            return $val;
        }
        if (str_starts_with($val, 'assets/')) {
            return asset($val);
        }
        if (Storage::disk('public')->exists($val)) {
            return Storage::disk('public')->url($val);
        }
        try {
            return Storage::url($val);
        } catch (\Exception $e) {
            return $default;
        }
    }
}

if (!function_exists('content_is_image')) {
    function content_is_image($key)
    {
        $val = content($key);
        if (!$val) return false;
        return str_starts_with($val, 'data:image/')
            || str_starts_with($val, 'http://')
            || str_starts_with($val, 'https://')
            || str_starts_with($val, 'assets/')
            || preg_match('/\.(jpg|jpeg|png|webp|svg|gif)$/i', $val);
    }
}
