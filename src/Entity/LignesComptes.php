<?php

namespace App\Entity;

use App\Repository\LignesComptesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignesComptesRepository::class)]
class LignesComptes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ligne_id = null;

    #[ORM\ManyToOne(inversedBy: 'id_compte')]
    #[ORM\JoinColumn(nullable: false)]
    private ?comptes $compte_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_operation = null;

    #[ORM\Column(length: 50)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $montant = null;

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigneId(): ?int
    {
        return $this->ligne_id;
    }

    public function setLigneId(int $ligne_id): static
    {
        $this->ligne_id = $ligne_id;

        return $this;
    }

    public function getCompteId(): ?comptes
    {
        return $this->compte_id;
    }

    public function setCompteId(?comptes $compte_id): static
    {
        $this->compte_id = $compte_id;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->date_operation;
    }

    public function setDateOperation(\DateTimeInterface $date_operation): static
    {
        $this->date_operation = $date_operation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

}
