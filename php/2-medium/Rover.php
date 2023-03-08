<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    //Utilisation de str_split pour transformer la ligne de commande en tableau
    //Restructuration des conditions en utilisant match() pour améliore la visibilité du code
    public function receive(string $commandsSequence): void
    {
        $commands = str_split($commandsSequence);
        foreach($commands as $command)
        {
            match($this->direction)
            {
                "N" =>
                    match($command)
                    {
                        "r" => $this->direction = "E",
                        "l" => $this->direction = "W",
                        "f" => $this->y += 1,
                        default => $this->y += -1
                    },
                "S" =>
                    match($command)
                    {
                        "r" => $this->direction = "W",
                        "l" => $this->direction = "E",
                        "f" => $this->y -= 1,
                        default => $this->y -= -1
                    },
                "W" =>
                    match($command)
                    {
                        "r" => $this->direction = "N",
                        "l" => $this->direction = "S",
                        "f" => $this->x -= 1,
                        default => $this->x -= -1
                    },
                default =>
                    match($command)
                    {
                        "r" => $this->direction = "S",
                        "l" => $this->direction = "N",
                        "f" => $this->x += 1,
                        default => $this->x += -1
                    }
            };
        }
    }
}