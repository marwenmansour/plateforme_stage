<?php

namespace App\Entity;

use App\Repository\EncaissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EncaissementRepository::class)
 */
class Encaissement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_transaction;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_encaisse;

    /**
     * @ORM\Column(type="text")
     */
    private $moyen_payement;

    /**
     * @ORM\ManyToOne(targetEntity=Facture::class, inversedBy="id_encaissement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_encaissement;

    /**
     * @ORM\OneToMany(targetEntity=Agents::class, mappedBy="agent_id")
     */
    private $id_agent;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="facture_id")
     */
    private $facture_id;

    /**
     * @ORM\ManyToOne(targetEntity=Agents::class, inversedBy="encaissements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent_id;

    public function __construct()
    {
        $this->id_agent = new ArrayCollection();
        $this->facture_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTransaction(): ?\DateTimeInterface
    {
        return $this->date_transaction;
    }

    public function setDateTransaction(\DateTimeInterface $date_transaction): self
    {
        $this->date_transaction = $date_transaction;

        return $this;
    }

    public function getMontantEncaisse(): ?float
    {
        return $this->montant_encaisse;
    }

    public function setMontantEncaisse(float $montant_encaisse): self
    {
        $this->montant_encaisse = $montant_encaisse;

        return $this;
    }

    public function getMoyenPayement(): ?string
    {
        return $this->moyen_payement;
    }

    public function setMoyenPayement(string $moyen_payement): self
    {
        $this->moyen_payement = $moyen_payement;

        return $this;
    }

    public function getIdEncaissement(): ?Facture
    {
        return $this->id_encaissement;
    }

    public function setIdEncaissement(?Facture $id_encaissement): self
    {
        $this->id_encaissement = $id_encaissement;

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
            $idAgent->setAgentId($this);
        }

        return $this;
    }

    public function removeIdAgent(Agents $idAgent): self
    {
        if ($this->id_agent->removeElement($idAgent)) {
            // set the owning side to null (unless already changed)
            if ($idAgent->getAgentId() === $this) {
                $idAgent->setAgentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getFactureId(): Collection
    {
        return $this->facture_id;
    }

    public function addFactureId(Facture $factureId): self
    {
        if (!$this->facture_id->contains($factureId)) {
            $this->facture_id[] = $factureId;
            $factureId->setFactureId($this);
        }

        return $this;
    }

    public function removeFactureId(Facture $factureId): self
    {
        if ($this->facture_id->removeElement($factureId)) {
            // set the owning side to null (unless already changed)
            if ($factureId->getFactureId() === $this) {
                $factureId->setFactureId(null);
            }
        }

        return $this;
    }

    public function getAgentId(): ?Agents
    {
        return $this->agent_id;
    }

    public function setAgentId(?Agents $agent_id): self
    {
        $this->agent_id = $agent_id;

        return $this;
    }
}
