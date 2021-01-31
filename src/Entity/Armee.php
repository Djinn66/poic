<?php

namespace App\Entity;

use App\Repository\ArmeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ArmeeRepository::class)
 */
class Armee
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
     * @ORM\ManyToMany(targetEntity=Epreuve::class, inversedBy="armees")
     * @ORM\JoinTable(name="armee_epreuve")
     */
    private $epreuves;

    /**
     * @ORM\ManyToMany(targetEntity="Grade", inversedBy="armees")
     * @ORM\JoinTable(name="armee_grade",
     *   joinColumns={
     *     @ORM\JoinColumn(name="armee_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="grade_id", referencedColumnName="id")
     *   }
     * )
     * @ORM\OrderBy({"id" = "DESC"})
     * @Groups("grade:read")
     */
    private $grades;

    /**
     * @ORM\OneToMany(targetEntity=Personnel::class, mappedBy="armee")
     */
    private $personnels;

    public function __construct()
    {
        $this->epreuves = new ArrayCollection();
        $this->grades = new ArrayCollection();
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
            $personnel->setArmee($this);
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): self
    {
        if ($this->personnels->removeElement($personnel)) {
            // set the owning side to null (unless already changed)
            if ($personnel->getArmee() === $this) {
                $personnel->setArmee(null);
            }
        }

        return $this;
    }

}
