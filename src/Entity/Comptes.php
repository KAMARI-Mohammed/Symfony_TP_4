<?php

namespace App\Entity;

use App\Repository\ComptesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptesRepository::class)]
class Comptes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $compte_id = null;

    #[ORM\ManyToOne(inversedBy: 'id_client')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client_id = null;

    #[ORM\Column(length: 20)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ouverture = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $solde = null;

    #[ORM\OneToMany(mappedBy: 'compte_id', targetEntity: LignesComptes::class)]
    private Collection $id_compte;

    public function __construct()
    {
        $this->id_compte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteId(): ?int
    {
        return $this->compte_id;
    }

    public function setCompteId(int $compte_id): static
    {
        $this->compte_id = $compte_id;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(\DateTimeInterface $date_ouverture): static
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection<int, LignesComptes>
     */
    public function getIdCompte(): Collection
    {
        return $this->id_compte;
    }

    public function addIdCompte(LignesComptes $idCompte): static
    {
        if (!$this->id_compte->contains($idCompte)) {
            $this->id_compte->add($idCompte);
            $idCompte->setCompteId($this);
        }

        return $this;
    }

    public function removeIdCompte(LignesComptes $idCompte): static
    {
        if ($this->id_compte->removeElement($idCompte)) {
            // set the owning side to null (unless already changed)
            if ($idCompte->getCompteId() === $this) {
                $idCompte->setCompteId(null);
            }
        }

        return $this;
    }
}
