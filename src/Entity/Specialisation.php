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

    #[ORM\OneToMany(mappedBy: 'codeSpe', targetEntity: Kine::class)]
    private Collection $kines;

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

    /**
     * @return Collection<int, Kine>
     */
    public function getKines(): Collection
    {
        return $this->kines;
    }

    public function addKine(Kine $kine): static
    {
        if (!$this->kines->contains($kine)) {
            $this->kines->add($kine);
            $kine->setidSpe($this);
        }

        return $this;
    }

    public function removeKine(Kine $kine): static
    {
        if ($this->kines->removeElement($kine)) {
            // set the owning side to null (unless already changed)
            if ($kine->getidSpe() === $this) {
                $kine->setidSpe(null);
            }
        }

        return $this;
    }
}
