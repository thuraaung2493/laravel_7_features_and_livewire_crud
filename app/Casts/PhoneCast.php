<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PhoneCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        // dd($model, $key, $value, $attributes);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        dd($model, $key, $value, $attributes);
    }
}
