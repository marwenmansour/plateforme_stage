<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratRepository::class)
 */
class Contrat
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
    private $date_creation;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_contrat;

    /**
     * @ORM\Column(type="date")
     */
    private $date_signature;

    /**
     * @ORM\Column(type="text")
     */
    private $pdf;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="id_contrat")
     */
    private $id_contrat;

    /**
     * @ORM\OneToOne(targetEntity=DossierAdherent::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $dossier_id;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="contrat_id")
     */
    private $contrat_id;

    public function __construct()
    {
        $this->id_contrat = new ArrayCollection();
        $this->contrat_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMontantContrat(): ?float
    {
        return $this->montant_contrat;
    }

    public function setMontantContrat(float $montant_contrat): self
    {
        $this->montant_contrat = $montant_contrat;

        return $this;
    }

    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->date_signature;
    }

    public function setDateSignature(\DateTimeInterface $date_signature): self
    {
        $this->date_signature = $date_signature;

        return $this;
    }

    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    public function setPdf(string $pdf): self
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getIdContrat(): Collection
    {
        return $this->id_contrat;
    }

    public function addIdContrat(Facture $idContrat): self
    {
        if (!$this->id_contrat->contains($idContrat)) {
            $this->id_contrat[] = $idContrat;
            $idContrat->setIdContrat($this);
        }

        return $this;
    }

    public function removeIdContrat(Facture $idContrat): self
    {
        if ($this->id_contrat->removeElement($idContrat)) {
            // set the owning side to null (unless already changed)
            if ($idContrat->getIdContrat() === $this) {
                $idContrat->setIdContrat(null);
            }
        }

        return $this;
    }

    public function getDossierId(): ?DossierAdherent
    {
        return $this->dossier_id;
    }

    public function setDossierId(DossierAdherent $dossier_id): self
    {
        $this->dossier_id = $dossier_id;

        return $this;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getContratId(): Collection
    {
        return $this->contrat_id;
    }

    public function addContratId(Facture $contratId): self
    {
        if (!$this->contrat_id->contains($contratId)) {
            $this->contrat_id[] = $contratId;
            $contratId->setContratId($this);
        }

        return $this;
    }

    public function removeContratId(Facture $contratId): self
    {
        if ($this->contrat_id->removeElement($contratId)) {
            // set the owning side to null (unless already changed)
            if ($contratId->getContratId() === $this) {
                $contratId->setContratId(null);
            }
        }

        return $this;
    }
}
