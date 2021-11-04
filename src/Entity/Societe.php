<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
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
}
