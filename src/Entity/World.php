<?php

namespace App\Entity;

use App\Repository\WorldRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Jsor\Doctrine\PostGIS\Functions\Geography;
use Jsor\Doctrine\PostGIS\Types\PostGISType;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: WorldRepository::class)]
#[Broadcast]
class World extends WorldEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $position = null;

    #[ORM\Column]
    private array $hero = [];

    #[ORM\Column]
    private array $suzerain = [];

    #[ORM\Column]
    private array $vassals = [];

    #[ORM\Column(type: PostGISType::GEOGRAPHY)]
    private $geo = null;

    #[Gedmo\Timestampable(on:"update")]
    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[Gedmo\Timestampable(on:"update")]
    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $userId): static
    {
        $this->user_id = $userId;

        return $this;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getGeo()
    {
        return $this->geo;
    }

    public function setGeo(string $geo): static
    {
        $this->geo = $geo;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getHero(): array
    {
        return $this->hero;
    }

    public function setHero(array $hero): static
    {
        $this->hero = $hero;

        return $this;
    }

    public function getSuzerain(): array
    {
        return $this->suzerain;
    }

    public function setSuzerain(array $suzerain): static
    {
        $this->suzerain = $suzerain;

        return $this;
    }
    public function getVassals(): array
    {
        return $this->vassals;
    }

    public function setVassals(array $vassals): static
    {
        $this->vassals = $vassals;

        return $this;
    }
}
