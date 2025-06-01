<?php

namespace App\Contracts\DTOs;

interface ToDtoAdapter
{
    public function toDto() : DtoContract;
}
