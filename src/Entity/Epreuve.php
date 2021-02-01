<?php

namespace App\Entity;

use App\Repository\EpreuveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EpreuveRepository::class)
 */
class Epreuve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"epreuve:read", "armee:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"epreuve:read", "armee:read"})
     */
    private $intitule;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"epreuve:read", "armee:read"})
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

    /**
     * @ORM\OneToMany(targetEntity=ValidationEpreuve::class, mappedBy="id_epreuve")
     */
    private $id_validation;

    public function __construct()
    {
        $this->armees = new ArrayCollection();
        $this->personnels = new ArrayCollection();
        $this->id_personnel = new ArrayCollection();
        $this->id_validation = new ArrayCollection();
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
     * @return Collection|ValidationEpreuve[]
     */
    public function getIdValidation(): Collection
    {
        return $this->id_validation;
    }

    public function addIdValidation(ValidationEpreuve $idValidation): self
    {
        if (!$this->id_validation->contains($idValidation)) {
            $this->id_validation[] = $idValidation;
            $idValidation->setIdEpreuve($this);
        }

        return $this;
    }

    public function removeIdValidation(ValidationEpreuve $idValidation): self
    {
        if ($this->id_validation->removeElement($idValidation)) {
            // set the owning side to null (unless already changed)
            if ($idValidation->getIdEpreuve() === $this) {
                $idValidation->setIdEpreuve(null);
            }
        }

        return $this;
    }

}
