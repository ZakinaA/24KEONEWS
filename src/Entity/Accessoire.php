<?php

namespace App\Entity;

use App\Repository\AccessoireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: AccessoireRepository::class)]
#[Broadcast]
class Accessoire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'accessoires')]
    private ?Instrument $accessoire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getAccessoire(): ?Instrument
    {
        return $this->accessoire;
    }

    public function setAccessoire(?Instrument $accessoire): static
    {
        $this->accessoire = $accessoire;

        return $this;
    }
}
