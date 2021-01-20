<?php

namespace App\Entity;

use App\Repository\ArmeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmeeRepository::class)
 */
class Armee
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
     * @ORM\ManyToMany(targetEntity=Epreuve::class, inversedBy="armees")
     */
    private $epreuves;

    /**
     * @ORM\ManyToMany(targetEntity=Grade::class, inversedBy="armees")
     */
    private $grades;

    public function __construct()
    {
        $this->epreuves = new ArrayCollection();
        $this->grades = new ArrayCollection();
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
     * @return Collection|epreuve[]
     */
    public function getEpreuves(): Collection
    {
        return $this->epreuves;
    }

    public function addEpreufe(epreuve $epreufe): self
    {
        if (!$this->epreuves->contains($epreufe)) {
            $this->epreuves[] = $epreufe;
        }

        return $this;
    }

    public function removeEpreufe(epreuve $epreufe): self
    {
        $this->epreuves->removeElement($epreufe);

        return $this;
    }

    public function __toString(): ?String
    {
        return $this->getIntitule();
    }

    /**
     * @return Collection|grade[]
     */
    public function getGrades(): Collection
    {
        return $this->grades;
    }

    public function addGrade(grade $grade): self
    {
        if (!$this->grades->contains($grade)) {
            $this->grades[] = $grade;
        }

        return $this;
    }

    public function removeGrade(grade $grade): self
    {
        $this->grades->removeElement($grade);

        return $this;
    }
}
