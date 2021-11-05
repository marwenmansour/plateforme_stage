<?php

namespace App\Entity;

use App\Repository\DossierAdherentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierAdherentRepository::class)
 */
class DossierAdherent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $libelle;

    /**
     * @ORM\Column(type="date")
     */
    private $date_creation;

    /**
     * @ORM\Column(type="text")
     */
    private $activite;

    /**
     * @ORM\Column(type="text")
     */
    private $adresse_pro;

    /**
     * @ORM\Column(type="text")
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=Societe::class, mappedBy="id_societe", orphanRemoval=true)
     */
    private $id_societe;

    /**
     * @ORM\OneToOne(targetEntity=Adherents::class, inversedBy="id_adherent", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_adherent;

    /**
     * @ORM\OneToMany(targetEntity=Agents::class, mappedBy="id_agent", orphanRemoval=true)
     */
    private $id_agent;

    /**
     * @ORM\OneToOne(targetEntity=Adherents::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $adherent_id;

    /**
     * @ORM\OneToMany(targetEntity=Societe::class, mappedBy="societe_id")
     */
    private $societe_id;

    /**
     * @ORM\OneToOne(targetEntity=Agents::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent_id;

    public function __construct()
    {
        $this->id_societe = new ArrayCollection();
        $this->id_agent = new ArrayCollection();
        $this->societe_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getAdressePro(): ?string
    {
        return $this->adresse_pro;
    }

    public function setAdressePro(string $adresse_pro): self
    {
        $this->adresse_pro = $adresse_pro;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|Societe[]
     */
    public function getIdSociete(): Collection
    {
        return $this->id_societe;
    }

    public function addIdSociete(Societe $idSociete): self
    {
        if (!$this->id_societe->contains($idSociete)) {
            $this->id_societe[] = $idSociete;
            $idSociete->setIdSociete($this);
        }

        return $this;
    }

    public function removeIdSociete(Societe $idSociete): self
    {
        if ($this->id_societe->removeElement($idSociete)) {
            // set the owning side to null (unless already changed)
            if ($idSociete->getIdSociete() === $this) {
                $idSociete->setIdSociete(null);
            }
        }

        return $this;
    }

    public function getIdAdherent(): ?Adherents
    {
        return $this->id_adherent;
    }

    public function setIdAdherent(Adherents $id_adherent): self
    {
        $this->id_adherent = $id_adherent;

        return $this;
    }

    /**
     * @return Collection|Agents[]
     */
    public function getIdAgent(): Collection
    {
        return $this->id_agent;
    }

    public function addIdAgent(Agents $idAgent): self
    {
        if (!$this->id_agent->contains($idAgent)) {
            $this->id_agent[] = $idAgent;
            $idAgent->setIdAgent($this);
        }

        return $this;
    }

    public function removeIdAgent(Agents $idAgent): self
    {
        if ($this->id_agent->removeElement($idAgent)) {
            // set the owning side to null (unless already changed)
            if ($idAgent->getIdAgent() === $this) {
                $idAgent->setIdAgent(null);
            }
        }

        return $this;
    }

    public function getAdherentId(): ?Adherents
    {
        return $this->adherent_id;
    }

    public function setAdherentId(Adherents $adherent_id): self
    {
        $this->adherent_id = $adherent_id;

        return $this;
    }

    /**
     * @return Collection|Societe[]
     */
    public function getSocieteId(): Collection
    {
        return $this->societe_id;
    }

    public function addSocieteId(Societe $societeId): self
    {
        if (!$this->societe_id->contains($societeId)) {
            $this->societe_id[] = $societeId;
            $societeId->setSocieteId($this);
        }

        return $this;
    }

    public function removeSocieteId(Societe $societeId): self
    {
        if ($this->societe_id->removeElement($societeId)) {
            // set the owning side to null (unless already changed)
            if ($societeId->getSocieteId() === $this) {
                $societeId->setSocieteId(null);
            }
        }

        return $this;
    }

    public function getAgentId(): ?Agents
    {
        return $this->agent_id;
    }

    public function setAgentId(Agents $agent_id): self
    {
        $this->agent_id = $agent_id;

        return $this;
    }
}
