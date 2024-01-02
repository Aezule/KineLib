<?php

namespace App\Entity;

use App\Repository\KineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KineRepository::class)]
class Kine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: "kines")]
    #[ORM\JoinColumn(name: "idSpe", referencedColumnName: "idSpe", nullable: false)]
    private ?Specialisation $idSpe = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $tel = null;

    #[ORM\Column(length: 75)]
    private ?string $mail = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $idUser = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getidUser(): ?User
    {
        return $this->idUser;
    }

    public function setidUser(User $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

   
    public function getidSpe(): ?Specialisation
    {
        return $this->idSpe;
    }

    public function setidSpe(?Specialisation $idSpe): static
    {
        $this->idSpe = $idSpe;

        return $this;
    }
}
