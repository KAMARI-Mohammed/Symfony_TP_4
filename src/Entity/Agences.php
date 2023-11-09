<?php

namespace App\Entity;

use App\Repository\AgencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgencesRepository::class)]
class Agences
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $agence_id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom_agence = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse_agence = null;

    #[ORM\OneToMany(mappedBy: 'agence_id', targetEntity: Conseillers::class)]
    private Collection $id_agence;

    public function __construct()
    {
        $this->id_agence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgenceId(): ?int
    {
        return $this->agence_id;
    }

    public function setAgenceId(int $agence_id): static
    {
        $this->agence_id = $agence_id;

        return $this;
    }

    public function getNomAgence(): ?string
    {
        return $this->nom_agence;
    }

    public function setNomAgence(string $nom_agence): static
    {
        $this->nom_agence = $nom_agence;

        return $this;
    }

    public function getAdresseAgence(): ?string
    {
        return $this->adresse_agence;
    }

    public function setAdresseAgence(string $adresse_agence): static
    {
        $this->adresse_agence = $adresse_agence;

        return $this;
    }

    /**
     * @return Collection<int, Conseillers>
     */
    public function getIdAgence(): Collection
    {
        return $this->id_agence;
    }

    public function addIdAgence(Conseillers $idAgence): static
    {
        if (!$this->id_agence->contains($idAgence)) {
            $this->id_agence->add($idAgence);
            $idAgence->setAgenceId($this);
        }

        return $this;
    }

    public function removeIdAgence(Conseillers $idAgence): static
    {
        if ($this->id_agence->removeElement($idAgence)) {
            // set the owning side to null (unless already changed)
            if ($idAgence->getAgenceId() === $this) {
                $idAgence->setAgenceId(null);
            }
        }

        return $this;
    }
}
