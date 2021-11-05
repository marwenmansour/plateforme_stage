<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeRepository::class)
 */
class Demande
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
    private $type_demande;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\Column(type="text")
     */
    private $statut;

    /**
     * @ORM\Column(type="text")
     */
    private $pieces_jointes;

    /**
     * @ORM\ManyToOne(targetEntity=Societe::class, inversedBy="demandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe_id;

    /**
     * @ORM\OneToMany(targetEntity=Intervention::class, mappedBy="demande_id")
     */
    private $interventions;

    public function __construct()
    {
        $this->interventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDemande(): ?string
    {
        return $this->type_demande;
    }

    public function setTypeDemande(string $type_demande): self
    {
        $this->type_demande = $type_demande;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

    public function getPiecesJointes(): ?string
    {
        return $this->pieces_jointes;
    }

    public function setPiecesJointes(string $pieces_jointes): self
    {
        $this->pieces_jointes = $pieces_jointes;

        return $this;
    }

    public function getSocieteId(): ?Societe
    {
        return $this->societe_id;
    }

    public function setSocieteId(?Societe $societe_id): self
    {
        $this->societe_id = $societe_id;

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
            $intervention->setDemandeId($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getDemandeId() === $this) {
                $intervention->setDemandeId(null);
            }
        }

        return $this;
    }
}
