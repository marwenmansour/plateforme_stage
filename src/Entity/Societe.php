<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocieteRepository::class)
 */
class Societe
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
    private $pieces_justificatives;

    /**
     * @ORM\ManyToOne(targetEntity=DossierAdherent::class, inversedBy="id_societe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_societe;

    /**
     * @ORM\ManyToOne(targetEntity=DossierAdherent::class, inversedBy="societe_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe_id;

    /**
     * @ORM\OneToMany(targetEntity=Demande::class, mappedBy="societe_id")
     */
    private $demandes;

    public function __construct()
    {
        $this->demandes = new ArrayCollection();
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

    public function getPiecesJustificatives(): ?string
    {
        return $this->pieces_justificatives;
    }

    public function setPiecesJustificatives(string $pieces_justificatives): self
    {
        $this->pieces_justificatives = $pieces_justificatives;

        return $this;
    }

    public function getIdSociete(): ?DossierAdherent
    {
        return $this->id_societe;
    }

    public function setIdSociete(?DossierAdherent $id_societe): self
    {
        $this->id_societe = $id_societe;

        return $this;
    }

    public function getSocieteId(): ?DossierAdherent
    {
        return $this->societe_id;
    }

    public function setSocieteId(?DossierAdherent $societe_id): self
    {
        $this->societe_id = $societe_id;

        return $this;
    }

    /**
     * @return Collection|Demande[]
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demande $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
            $demande->setSocieteId($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getSocieteId() === $this) {
                $demande->setSocieteId(null);
            }
        }

        return $this;
    }
}
