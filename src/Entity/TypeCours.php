<?php

namespace App\Entity;

use App\Repository\TypeCoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeCoursRepository::class)]
class TypeCours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(targetEntity: Cours::class, mappedBy: 'typecours')]
    private Collection $cours;

    #[ORM\OneToMany(targetEntity: Tarif::class, mappedBy: 'typecours')]
    private Collection $tarifs;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->tarifs = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): static
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
            $cour->setTypecours($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): static
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getTypecours() === $this) {
                $cour->setTypecours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tarif>
     */
    public function getTarifs(): Collection
    {
        return $this->tarifs;
    }

    public function addTarif(Tarif $tarif): static
    {
        if (!$this->tarifs->contains($tarif)) {
            $this->tarifs->add($tarif);
            $tarif->setTypecours($this);
        }

        return $this;
    }

    public function removeTarif(Tarif $tarif): static
    {
        if ($this->tarifs->removeElement($tarif)) {
            // set the owning side to null (unless already changed)
            if ($tarif->getTypecours() === $this) {
                $tarif->setTypecours(null);
            }
        }

        return $this;
    }
}