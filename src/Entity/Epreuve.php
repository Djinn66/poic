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
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $calcul;

    /**
     * @ORM\Column(type="integer")
     */
    private $periodicite;

    /**
     * Many Epreuves Have Many Armees
     * @ORM\ManyToMany(targetEntity=Armee::class, mappedBy="epreuves")
     */
    private $armees;

    /**
     * @ORM\ManyToMany(targetEntity=Personnel::class, inversedBy="epreuves")
     */
    private $personnels;

    /**
     * One Epreuve has many Baremes. This is the inverse side.
     * @ORM\OneToMany(targetEntity=Bareme::class, mappedBy="epreuve")
     */
    private $baremes;

    public function __construct()
    {
        $this->armees = new ArrayCollection();
        $this->personnels = new ArrayCollection();
        $this->baremes = new ArrayCollection();
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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCalcul(): ?string
    {
        return $this->calcul;
    }

    public function setCalcul($calcul): self
    {
        $this->calcul = $calcul;

        return $this;
    }

    public function getPeriodicite(): ?int
    {
        return $this->periodicite;
    }

    public function setPeriodicite(int $periodicite): self
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
    /**
     * @return Collection|bareme[]
     */
    public function getBaremes(): Collection
    {
        return $this->baremes;
    }

    public function addBareme(Bareme $bareme): self
    {
        if (!$this->baremes->contains($bareme)) {
            $this->baremes[] = $bareme;
        }

        return $this;
    }

    public function removeBareme(Bareme $bareme): self
    {
        $this->baremes->removeElement($bareme);

        return $this;
    }
}
