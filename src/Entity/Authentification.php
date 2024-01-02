<?php

namespace App\Entity;

use App\Repository\AuthentificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthentificationRepository::class)]
class Authentification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $login = null;

    #[ORM\Column(length: 75)]
    private ?string $mdp = null;

    #[ORM\Column]
    private ?bool $estadmin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function isEstadmin(): ?bool
    {
        return $this->estadmin;
    }

    public function setEstadmin(bool $estadmin): static
    {
        $this->estadmin = $estadmin;

        return $this;
    }
}
