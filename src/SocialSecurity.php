<?php

namespace Mazedlx\SocialSecurity;

class SocialSecurity
{
    const CHECKSUM_INDEX = 3;
    const MODULO = 11;
    const THRESHOLD = 10;
    const WEIGHTS = [
        3,
        7,
        9,
        5,
        8,
        4,
        2,
        1,
        6,
    ];

    public $socialSecurityNumber;

    public function __construct(mixed $socialSecurityNumber)
    {
        $this->socialSecurityNumber = $socialSecurityNumber;
    }

    public function isValid(): bool
    {
        return $this->validate();
    }

    protected function validate(): bool
    {
        $digits = \preg_replace('/[\s]/', '', $this->socialSecurityNumber);
        if (! (bool) \preg_match('/^[\d]+$/', $digits)) {
            return false;
        }

        $socialSecurityDigits = \collect(\mb_str_split($digits, 1));

        $checksum = $socialSecurityDigits
            ->filter(function ($digit, $index) {
                return self::CHECKSUM_INDEX !== $index;
            })->values()
            ->map(function ($digit) {
                return (int) $digit;
            })->map(function ($digit, $index) {
                return $digit * self::WEIGHTS[$index];
            })->reduce(function ($carry, $product) {
                return $carry + $product;
            }, 0) % self::MODULO;

        return $checksum < self::THRESHOLD &&
            $checksum === (int) $socialSecurityDigits[self::CHECKSUM_INDEX];
    }
}
