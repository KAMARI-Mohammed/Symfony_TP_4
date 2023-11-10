<?php

namespace App\Entity;

use App\Repository\RelationClientConseillerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelationClientConseillerRepository::class)]
class RelationClientConseiller
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'relation_client_id')]
    private Collection $client_id;

    #[ORM\ManyToMany(targetEntity: conseillers::class, inversedBy: 'relation_conseiller_id')]
    private Collection $conseiller_id;

    public function __construct()
    {
        $this->client_id = new ArrayCollection();
        $this->conseiller_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClientId(): Collection
    {
        return $this->client_id;
    }

    public function addClientId(Client $clientId): static
    {
        if (!$this->client_id->contains($clientId)) {
            $this->client_id->add($clientId);
        }

        return $this;
    }

    public function removeClientId(Client $clientId): static
    {
        $this->client_id->removeElement($clientId);

        return $this;
    }

    /**
     * @return Collection<int, conseillers>
     */
    public function getConseillerId(): Collection
    {
        return $this->conseiller_id;
    }

    public function addConseillerId(conseillers $conseillerId): static
    {
        if (!$this->conseiller_id->contains($conseillerId)) {
            $this->conseiller_id->add($conseillerId);
        }

        return $this;
    }

    public function removeConseillerId(conseillers $conseillerId): static
    {
        $this->conseiller_id->removeElement($conseillerId);

        return $this;
    }
}
