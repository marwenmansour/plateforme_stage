<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
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
    private $date_facture;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_total;

    /**
     * @ORM\Column(type="float")
     */
    private $reste_paye;

    /**
     * @ORM\Column(type="text")
     */
    private $pdf;

    /**
     * @ORM\ManyToOne(targetEntity=Contrat::class, inversedBy="id_contrat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_contrat;

    /**
     * @ORM\OneToMany(targetEntity=Encaissement::class, mappedBy="id_encaissement")
     */
    private $id_encaissement;

    /**
     * @ORM\ManyToOne(targetEntity=Contrat::class, inversedBy="contrat_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contrat_id;

    /**
     * @ORM\ManyToOne(targetEntity=Encaissement::class, inversedBy="facture_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $facture_id;

    public function __construct()
    {
        $this->id_encaissement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): self
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getMontantTotal(): ?float
    {
        return $this->montant_total;
    }

    public function setMontantTotal(float $montant_total): self
    {
        $this->montant_total = $montant_total;

        return $this;
    }

    public function getRestePaye(): ?float
    {
        return $this->reste_paye;
    }

    public function setRestePaye(float $reste_paye): self
    {
        $this->reste_paye = $reste_paye;

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

    public function getIdContrat(): ?Contrat
    {
        return $this->id_contrat;
    }

    public function setIdContrat(?Contrat $id_contrat): self
    {
        $this->id_contrat = $id_contrat;

        return $this;
    }

    /**
     * @return Collection|Encaissement[]
     */
    public function getIdEncaissement(): Collection
    {
        return $this->id_encaissement;
    }

    public function addIdEncaissement(Encaissement $idEncaissement): self
    {
        if (!$this->id_encaissement->contains($idEncaissement)) {
            $this->id_encaissement[] = $idEncaissement;
            $idEncaissement->setIdEncaissement($this);
        }

        return $this;
    }

    public function removeIdEncaissement(Encaissement $idEncaissement): self
    {
        if ($this->id_encaissement->removeElement($idEncaissement)) {
            // set the owning side to null (unless already changed)
            if ($idEncaissement->getIdEncaissement() === $this) {
                $idEncaissement->setIdEncaissement(null);
            }
        }

        return $this;
    }

    public function getContratId(): ?Contrat
    {
        return $this->contrat_id;
    }

    public function setContratId(?Contrat $contrat_id): self
    {
        $this->contrat_id = $contrat_id;

        return $this;
    }

    public function getFactureId(): ?Encaissement
    {
        return $this->facture_id;
    }

    public function setFactureId(?Encaissement $facture_id): self
    {
        $this->facture_id = $facture_id;

        return $this;
    }
}
