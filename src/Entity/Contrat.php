<?php

namespace App\Entity;

use App\Repository\ContratRepository;
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
}
