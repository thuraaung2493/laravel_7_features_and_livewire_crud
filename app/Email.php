<?php

namespace App;

use Illuminate\Support\Str;
use InvalidArgumentException;

class Email
{
    public $address;

    public function __construct(string $address)
    {
        if (! filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email here');
        }

        $this->address = $address;
    }

    public function domain()
    {
        return Str::of($this->address)->after('@')->__toString();
    }
}
