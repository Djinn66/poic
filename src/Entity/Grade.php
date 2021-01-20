<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
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
     * @ORM\ManyToMany(targetEntity=Armee::class, mappedBy="grades")
     */
    private $armees;

    public function __construct()
    {
        $this->armees = new ArrayCollection();
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
}
