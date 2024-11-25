<?php

namespace App\Entity;

use App\Repository\ResponsableRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ResponsableRepository::class)]
class Responsable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Le nom doit comporter au minimum 2 caractères',
        maxMessage: 'Le nom doit comporter au maximum 50 caractères',
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Le prenom doit comporter au minimum 2 caractères',
        maxMessage: 'Le prenom doit comporter au maximum 50 caractères',
    )]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $numRue = null;

    #[ORM\Column(length: 50)]
    private ?string $rue = null;

    #[ORM\Column]
    #[Assert\Length(
        min: 5,
        max: 5,
        minMessage: 'Le code postal doit comporter au minimum 5 caractères',
        maxMessage: 'Le code postal doit comporter au maximum 5 caractères',
    )]
    private ?int $copos = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column]
    #[Assert\Length(
        min: 9,
        max: 10,
        minMessage: 'Le numero de telephone doit comporter au minimum 9 caractères',
        maxMessage: 'Le numero de telephone doit comporter au maximum 10 caractères',
    )]
    private ?int $tel = null;

    #[ORM\Column(length: 50)]
    private ?string $mail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumRue(): ?int
    {
        return $this->numRue;
    }

    public function setNumRue(int $numRue): static
    {
        $this->numRue = $numRue;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCopos(): ?int
    {
        return $this->copos;
    }

    public function setCopos(int $copos): static
    {
        $this->copos = $copos;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }
}