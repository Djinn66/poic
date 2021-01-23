<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("grade:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("grade:read")
     */
    private $intitule;

    /**
     * @ORM\ManyToMany(targetEntity="Armee", mappedBy="grades")
     */
    private $armees;

    /**
     * @ORM\Column(type="string", length=5)
     * @Groups("grade:read")
     */
    private $abreviation;

    /**
     * @ORM\OneToMany(targetEntity=Personnel::class, mappedBy="grade")
     */
    private $personnels;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("grade:read")
     */
    private $categorie;

    /**
     * @ORM\Column(type="smallint")
     * @Groups("grade:read")
     */
    private $rang;

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
            $armee->addGrade($this);
        }

        return $this;
    }

    public function removeArmee(Armee $armee): self
    {
        if ($this->armees->removeElement($armee)) {
            $armee->removeGrade($this);
        }

        return $this;
    }

    public function __toString(): ?String
    {
        return $this->getIntitule();
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    /**
     * @return Collection|Personnel[]
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnel $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels[] = $personnel;
            $personnel->setGrade($this);
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): self
    {
        if ($this->personnels->removeElement($personnel)) {
            // set the owning side to null (unless already changed)
            if ($personnel->getGrade() === $this) {
                $personnel->setGrade(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(int $rang): self
    {
        $this->rang = $rang;

        return $this;
    }
}
