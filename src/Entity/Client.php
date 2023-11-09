<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $client_id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom_client = null;

    #[ORM\Column(length: 20)]
    private ?string $prenom_client = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse_client = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_naissance = null;

    #[ORM\Column(length: 20)]
    private ?string $situation_familiale = null;

    #[ORM\Column(length: 20)]
    private ?string $profession = null;

    #[ORM\OneToMany(mappedBy: 'client_id', targetEntity: Comptes::class)]
    private Collection $id_client;

    public function __construct()
    {
        $this->id_client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(int $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nom_client;
    }

    public function setNomClient(string $nom_client): static
    {
        $this->nom_client = $nom_client;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenom_client;
    }

    public function setPrenomClient(string $prenom_client): static
    {
        $this->prenom_client = $prenom_client;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->adresse_client;
    }

    public function setAdresseClient(string $adresse_client): static
    {
        $this->adresse_client = $adresse_client;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): static
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getSituationFamiliale(): ?string
    {
        return $this->situation_familiale;
    }

    public function setSituationFamiliale(string $situation_familiale): static
    {
        $this->situation_familiale = $situation_familiale;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * @return Collection<int, Comptes>
     */
    public function getIdClient(): Collection
    {
        return $this->id_client;
    }

    public function addIdClient(Comptes $idClient): static
    {
        if (!$this->id_client->contains($idClient)) {
            $this->id_client->add($idClient);
            $idClient->setClientId($this);
        }

        return $this;
    }

    public function removeIdClient(Comptes $idClient): static
    {
        if ($this->id_client->removeElement($idClient)) {
            // set the owning side to null (unless already changed)
            if ($idClient->getClientId() === $this) {
                $idClient->setClientId(null);
            }
        }

        return $this;
    }
}
