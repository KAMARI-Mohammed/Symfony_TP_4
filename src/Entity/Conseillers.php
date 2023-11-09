<?php

namespace App\Entity;

use App\Repository\ConseillersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConseillersRepository::class)]
class Conseillers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $conseiller_id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom_conseiller = null;

    #[ORM\Column(length: 20)]
    private ?string $prenom_conseiller = null;

    #[ORM\Column(length: 20)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'id_agence')]
    private ?agences $agence_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConseillerId(): ?int
    {
        return $this->conseiller_id;
    }

    public function setConseillerId(int $conseiller_id): static
    {
        $this->conseiller_id = $conseiller_id;

        return $this;
    }

    public function getNomConseiller(): ?string
    {
        return $this->nom_conseiller;
    }

    public function setNomConseiller(string $nom_conseiller): static
    {
        $this->nom_conseiller = $nom_conseiller;

        return $this;
    }

    public function getPrenomConseiller(): ?string
    {
        return $this->prenom_conseiller;
    }

    public function setPrenomConseiller(string $prenom_conseiller): static
    {
        $this->prenom_conseiller = $prenom_conseiller;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAgenceId(): ?agences
    {
        return $this->agence_id;
    }

    public function setAgenceId(?agences $agence_id): static
    {
        $this->agence_id = $agence_id;

        return $this;
    }
}
