<?php

namespace App\Enums;

enum ProductType: int
{

    case Racket = 1;
    case Shoes = 2;


    public function isRacket(): bool
    {
        return $this === self::Racket;
    }

    public function isShoes(): bool
    {
        return $this === self::Racket;
    }

    public function getLabelText(): string
    {
        return match ($this) {
            self::Racket => 'Racket',
            self::Shoes => 'Shoes'
        };
    }

    public function getOptions(): array
    {
        return match ($this) {
            self::Racket => 'Racket',
            self::Shoes => 'Shoes'
        };
    }

}
