<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InterventionRepository::class)
 */
class Intervention
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
    private $date_intervention;

    /**
     * @ORM\Column(type="text")
     */
    private $statut;

    /**
     * @ORM\Column(type="text")
     */
    private $rapport_intervention;

    /**
     * @ORM\Column(type="text")
     */
    private $pieces_jointes;

    /**
     * @ORM\ManyToOne(targetEntity=Demande::class, inversedBy="interventions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $demande_id;

    /**
     * @ORM\ManyToOne(targetEntity=Agents::class, inversedBy="interventions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIntervention(): ?\DateTimeInterface
    {
        return $this->date_intervention;
    }

    public function setDateIntervention(\DateTimeInterface $date_intervention): self
    {
        $this->date_intervention = $date_intervention;

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

    public function getRapportIntervention(): ?string
    {
        return $this->rapport_intervention;
    }

    public function setRapportIntervention(string $rapport_intervention): self
    {
        $this->rapport_intervention = $rapport_intervention;

        return $this;
    }

    public function getPiecesJointes(): ?string
    {
        return $this->pieces_jointes;
    }

    public function setPiecesJointes(string $pieces_jointes): self
    {
        $this->pieces_jointes = $pieces_jointes;

        return $this;
    }

    public function getDemandeId(): ?Demande
    {
        return $this->demande_id;
    }

    public function setDemandeId(?Demande $demande_id): self
    {
        $this->demande_id = $demande_id;

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
