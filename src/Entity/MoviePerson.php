<?php

namespace App\Entity;

use App\Repository\MoviePersonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoviePersonRepository::class)]
class MoviePerson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private array $role = [];

    #[ORM\ManyToOne(inversedBy: 'moviePeople')]
    private ?Movie $movie = null;

    #[ORM\ManyToOne(inversedBy: 'moviePeople')]
    private ?Person $person = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): array
    {
        return $this->role;
    }

    public function setRole(array $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }
}
