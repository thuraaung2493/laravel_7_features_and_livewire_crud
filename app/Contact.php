<?php

namespace App;

use App\Casts\PhoneCast;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    public static function search($search)
    {
        return self::where('name', 'LIKE', "%{$search}%")
                   ->orWhere('phone', 'LIKE', "%{$search}%");
    }
}
