<?php

namespace App\Entity;

use App\Repository\IslandRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: IslandRepository::class)]
class Island extends WorldEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private array $map = [];

    #[ORM\Column]
    private array $objects = [];

    #[Gedmo\Timestampable(on:"update")]
    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[Gedmo\Timestampable(on:"update")]
    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column]
    private ?int $world_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getMap(): array
    {
        return $this->map;
    }

    public function setMap(array $map): static
    {
        $this->map = $map;

        return $this;
    }

    public function getObjects(): array
    {
        return $this->objects;
    }

    public function setObjects(array $objects): static
    {
        $this->objects = $objects;

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

    public function getWorldId(): ?int
    {
        return $this->world_id;
    }

    public function setWorldId(int $world_id): static
    {
        $this->world_id = $world_id;

        return $this;
    }
}
