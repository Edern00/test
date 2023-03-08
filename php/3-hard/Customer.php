<?php

declare(strict_types=1);


namespace App;


class Customer
{
    private string $name;
    private array $rentals;

    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        return $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $each){
           //Déplacement du switch calculant le montant d'une location dans la méthode getAmount() de la classe Rental puisque cette info lui appartient plus qu'à la classe Customer
           $thisAmount = $each->getAmount();

           $frequentRenterPoints++;

           if($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE
                && $each->getDaysRented() > 1)
               $frequentRenterPoints++;

            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }
}