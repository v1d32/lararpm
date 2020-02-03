<?php

namespace App\Exceptions;

use InvalidArgumentException;

class MemberDoesNotExist extends InvalidArgumentException
{
    public static function named(string $memberName)
    {
        return new static("There is no member named `{$memberName}`.");
    }

    public static function withId(int $memberId)
    {
        return new static("There is no member with id `{$memberId}`.");
    }
}
