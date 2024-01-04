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
    private ?User $IdKine = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $IdClient = null;

    public function getdate(): ?\Datetime
    {
        return $this->DateRdv;
    }

    public function getIdKine(): ?User
    {
        return $this->IdKine;
    }

    public function setDateRdv(?User $daterdv): static
    {
        $this->DateRdv = $daterdv;

        return $this;
    }

    public function setIdKine(?User $IdKine): static
    {
        $this->IdKine = $IdKine;

        return $this;
    }

    public function getIdClient(): ?User
    {
        return $this->IdClient;
    }

    public function setIdClient(?User $IdClient): static
    {
        $this->IdClient = $IdClient;

        return $this;
    }
}
