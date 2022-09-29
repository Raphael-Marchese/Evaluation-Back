<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: Person::class, inversedBy: 'movies')]
    private Collection $realisator;

    #[ORM\Column]
    private ?\DateTimeImmutable $releast_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $poster = null;

    #[ORM\ManyToOne(inversedBy: 'movies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Genre $genre = null;

    public function __construct()
    {
        $this->realisator = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Person>
     */
    public function getRealisator(): Collection
    {
        return $this->realisator;
    }

    public function addRealisator(Person $realisator): self
    {
        if (!$this->realisator->contains($realisator)) {
            $this->realisator->add($realisator);
        }

        return $this;
    }

    public function removeRealisator(Person $realisator): self
    {
        $this->realisator->removeElement($realisator);

        return $this;
    }

    public function getReleastAt(): ?\DateTimeImmutable
    {
        return $this->releast_at;
    }

    public function setReleastAt(\DateTimeImmutable $releast_at): self
    {
        $this->releast_at = $releast_at;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }
}
