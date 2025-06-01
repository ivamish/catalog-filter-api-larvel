<?php

namespace App\Contracts\DTOs;

interface ArrayCreatable
{
    public static function fromArray(array $data) : static;
}
