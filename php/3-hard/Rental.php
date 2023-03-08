<?php

declare(strict_types=1);


namespace App;


class Rental
{
    private Movie $movie;
    private int $daysRented;

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getAmount(): float
    {
        $thisAmount = 0.0;

        switch($this->movie->getPriceCode()) {
            case Movie::REGULAR:
                $thisAmount += 2;
                if($this->daysRented > 2)
                    $thisAmount += ($this->daysRented - 2) * 1.5;
                break;
            case Movie::NEW_RELEASE:
                $thisAmount += $this->daysRented * 3;
                break;
            case Movie::CHILDREN:
                $thisAmount += 1.5;
                if($this->daysRented > 3) {
                    $thisAmount += ($this->daysRented - 3) * 1.5;
                }
                break;
        }

        return $thisAmount;
    }
}