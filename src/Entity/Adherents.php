<?php

namespace App\Entity;

use App\Repository\AdherentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherentsRepository::class)
 */
class Adherents
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
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="text")
     */
    private $mail;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="text")
     */
    private $adresse_perso;

    /**
     * @ORM\OneToOne(targetEntity=DossierAdherent::class, mappedBy="id_adherent", cascade={"persist", "remove"})
     */
    private $id_adherent;

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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdressePerso(): ?string
    {
        return $this->adresse_perso;
    }

    public function setAdressePerso(string $adresse_perso): self
    {
        $this->adresse_perso = $adresse_perso;

        return $this;
    }

    public function getIdAdherent(): ?DossierAdherent
    {
        return $this->id_adherent;
    }

    public function setIdAdherent(DossierAdherent $id_adherent): self
    {
        // set the owning side of the relation if necessary
        if ($id_adherent->getIdAdherent() !== $this) {
            $id_adherent->setIdAdherent($this);
        }

        $this->id_adherent = $id_adherent;

        return $this;
    }
}
