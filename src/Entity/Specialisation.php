<?php

namespace App\Entity;

use App\Repository\SpecialisationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialisationRepository::class)]
class Specialisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idSpe", type: "integer")]
    private ?int $idSpe = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;


    public function __construct()
    {
        $this->kines = new ArrayCollection();
    }

    public function getcodeSpe(): ?int
    {
        return $this->idSpe;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

}
