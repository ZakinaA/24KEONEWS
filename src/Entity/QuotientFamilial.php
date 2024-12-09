<?php

namespace App\Entity;

use App\Repository\QuotientFamilialRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuotientFamilialRepository::class)]
class QuotientFamilial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Le libelle doit comporter au minimum 2 caractères',
        maxMessage: 'Le libelle doit comporter au maximum 50 caractères',
    )]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $quotientMini = null;

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

    public function getQuotientMini(): ?int
    {
        return $this->quotientMini;
    }

    public function setQuotientMini(int $quotientMini): static
    {
        $this->quotientMini = $quotientMini;

        return $this;
    }
}
