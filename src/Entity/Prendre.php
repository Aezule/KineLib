<?php

namespace App\Entity;

use App\Repository\PrendreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrendreRepository::class)]
class Prendre
{
    #[ORM\Id]
    #[ORM\Column]
    private ?\DateTime $DateRdv = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Kine $IdKine = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $IdClient = null;

    public function getdate(): ?\Datetime
    {
        return $this->DateRdv;
    }

    public function getIdKine(): ?Kine
    {
        return $this->IdKine;
    }

    public function setDateRdv(?Kine $daterdv): static
    {
        $this->DateRdv = $daterdv;

        return $this;
    }

    public function setIdKine(?Kine $IdKine): static
    {
        $this->IdKine = $IdKine;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->IdClient;
    }

    public function setIdClient(?Client $IdClient): static
    {
        $this->IdClient = $IdClient;

        return $this;
    }
}
