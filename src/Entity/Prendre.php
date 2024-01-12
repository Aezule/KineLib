<?php

namespace App\Entity;

use App\Repository\PrendreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrendreRepository::class)]
class Prendre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private $id;



    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateRdv = null;

    #[ORM\ManyToOne]
    private ?User $Client = null;

    #[ORM\ManyToOne]
    private ?User $Kine = null;

    public function getdate(): ?\Datetime
    {
        return $this->DateRdv;
    }

    public function getKine(): int
    {
        return $this->Kine;
    }

    public function setDateRdv(?\Datetime $daterdv): static
    {
        $this->DateRdv = $daterdv;

        return $this;
    }


    public function getIdKine(): ?int{
        return $this->Kine->getId();
    }

    public function setKine(User $Kine): static
    {
        $this->Kine = $Kine;

        return $this;
    }

    public function getClient(): User
    {
        return $this->Client;
    }

    public function setClient(User $Client): static
    {
        $this->Client = $Client;

        return $this;
    }

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->DateRdv;
    }

    public function getPrendre(): ?User
    {
        return $this->Prendre;
    }

    public function setPrendre(?User $Prendre): static
    {
        $this->Prendre = $Prendre;

        return $this;
    }
}
