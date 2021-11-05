<?php

namespace App\Entity;

use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentsRepository::class)
 */
class Agents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="text")
     */
    private $fonction;

    /**
     * @ORM\ManyToOne(targetEntity=DossierAdherent::class, inversedBy="id_agent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_agent;

    /**
     * @ORM\ManyToOne(targetEntity=Encaissement::class, inversedBy="id_agent")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent_id;

    /**
     * @ORM\OneToOne(targetEntity=RoleAgent::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_role;

    /**
     * @ORM\OneToMany(targetEntity=Encaissement::class, mappedBy="agent_id")
     */
    private $encaissements;

    /**
     * @ORM\OneToMany(targetEntity=Intervention::class, mappedBy="agent_id")
     */
    private $interventions;

    public function __construct()
    {
        $this->encaissements = new ArrayCollection();
        $this->interventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getIdAgent(): ?DossierAdherent
    {
        return $this->id_agent;
    }

    public function setIdAgent(?DossierAdherent $id_agent): self
    {
        $this->id_agent = $id_agent;

        return $this;
    }

    public function getAgentId(): ?Encaissement
    {
        return $this->agent_id;
    }

    public function setAgentId(?Encaissement $agent_id): self
    {
        $this->agent_id = $agent_id;

        return $this;
    }

    public function getIdRole(): ?RoleAgent
    {
        return $this->id_role;
    }

    public function setIdRole(RoleAgent $id_role): self
    {
        $this->id_role = $id_role;

        return $this;
    }

    /**
     * @return Collection|Encaissement[]
     */
    public function getEncaissements(): Collection
    {
        return $this->encaissements;
    }

    public function addEncaissement(Encaissement $encaissement): self
    {
        if (!$this->encaissements->contains($encaissement)) {
            $this->encaissements[] = $encaissement;
            $encaissement->setAgentId($this);
        }

        return $this;
    }

    public function removeEncaissement(Encaissement $encaissement): self
    {
        if ($this->encaissements->removeElement($encaissement)) {
            // set the owning side to null (unless already changed)
            if ($encaissement->getAgentId() === $this) {
                $encaissement->setAgentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Intervention[]
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setAgentId($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getAgentId() === $this) {
                $intervention->setAgentId(null);
            }
        }

        return $this;
    }
}
