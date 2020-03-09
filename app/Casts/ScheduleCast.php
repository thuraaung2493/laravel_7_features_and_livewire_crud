<?php

namespace App\Casts;

use App\Schedule;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class ScheduleCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return new Schedule(
            $attributes['start'],
            $attributes['end']
        );
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return [
            'start' => $value->start,
            'end' => $value->end,
        ];
    }
}
