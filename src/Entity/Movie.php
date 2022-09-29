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

    #[ORM\Column]
    private ?\DateTimeImmutable $release_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $poster = null;

    #[ORM\ManyToOne(inversedBy: 'movies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Genre $genre = null;

    #[ORM\OneToMany(mappedBy: 'movie', targetEntity: MoviePerson::class)]
    private Collection $moviePeople;


    public function __construct()
    {
        $this->moviePeople = new ArrayCollection();
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

    public function getReleaseAt(): ?\DateTimeImmutable
    {
        return $this->release_at;
    }

    public function setReleaseAt(\DateTimeImmutable $release_at): self
    {
        $this->release_at = $release_at;

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

    /**
     * @return Collection<int, MoviePerson>
     */
    public function getMoviePeople(): Collection
    {
        return $this->moviePeople;
    }

    public function addMoviePerson(MoviePerson $moviePerson): self
    {
        if (!$this->moviePeople->contains($moviePerson)) {
            $this->moviePeople->add($moviePerson);
            $moviePerson->setMovie($this);
        }

        return $this;
    }

    public function removeMoviePerson(MoviePerson $moviePerson): self
    {
        if ($this->moviePeople->removeElement($moviePerson)) {
            // set the owning side to null (unless already changed)
            if ($moviePerson->getMovie() === $this) {
                $moviePerson->setMovie(null);
            }
        }

        return $this;
    }



}
