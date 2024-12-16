<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifRepository::class)]
class Tarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $montant = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    private ?TypeCours $typecours = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    private ?QuotientFamilial $quotientfamilial = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getTypecours(): ?TypeCours
    {
        return $this->typecours;
    }

    public function setTypecours(?TypeCours $typecours): static
    {
        $this->typecours = $typecours;

        return $this;
    }

    public function getQuotientfamilial(): ?QuotientFamilial
    {
        return $this->quotientfamilial;
    }

    public function setQuotientfamilial(?QuotientFamilial $quotientfamilial): static
    {
        $this->quotientfamilial = $quotientfamilial;

        return $this;
    }
}
