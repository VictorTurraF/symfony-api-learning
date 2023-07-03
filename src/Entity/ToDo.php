<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ToDo {
    #[Assert\NotBlank]
    public string $title;
    
    #[Assert\NotBlank]
    public int $estimatedTimeInMinutes;

    #[Assert\NotBlank]
    public array $tags;
}