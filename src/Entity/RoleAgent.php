<?php

namespace App\Entity;

use App\Repository\RoleAgentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleAgentRepository::class)
 */
class RoleAgent
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
    private $libelle_role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleRole(): ?string
    {
        return $this->libelle_role;
    }

    public function setLibelleRole(string $libelle_role): self
    {
        $this->libelle_role = $libelle_role;

        return $this;
    }
}
