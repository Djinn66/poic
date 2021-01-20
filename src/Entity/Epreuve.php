<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EpreuveRepository::class)
 */
class Epreuve
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
    private $intitule;

    /**
     * @ORM\Column(type="date")
     */
    private $periodicite;

    /**
     * @ORM\ManyToMany(targetEntity=Armee::class, mappedBy="epreuves")
     */
    private $armees;

    /**
     * @ORM\ManyToMany(targetEntity=Personnel::class, inversedBy="epreuves")
     */
    private $personnels;

    public function __construct()
    {
        $this->armees = new ArrayCollection();
        $this->personnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getPeriodicite(): ?\DateTimeInterface
    {
        return $this->periodicite;
    }

    public function setPeriodicite(\DateTimeInterface $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    /**
     * @return Collection|Armee[]
     */
    public function getArmees(): Collection
    {
        return $this->armees;
    }

    public function addArmee(Armee $armee): self
    {
        if (!$this->armees->contains($armee)) {
            $this->armees[] = $armee;
            $armee->addEpreufe($this);
        }

        return $this;
    }

    public function removeArmee(Armee $armee): self
    {
        if ($this->armees->removeElement($armee)) {
            $armee->removeEpreufe($this);
        }

        return $this;
    }

    public function __toString(): ?String
    {
        return $this->getIntitule();
    }

    /**
     * @return Collection|personnel[]
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnel $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels[] = $personnel;
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): self
    {
        $this->personnels->removeElement($personnel);

        return $this;
    }
}
