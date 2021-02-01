<?php

namespace App\Entity;

use App\Repository\ValidationEpreuveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ValidationEpreuveRepository::class)
 */
class ValidationEpreuve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $resultat;

    /**
     * @ORM\OneToMany(targetEntity=personnel::class, mappedBy="id_validation")
     */
    private $id_personnel;

    /**
     * @ORM\ManyToOne(targetEntity=epreuve::class, inversedBy="id_validation")
     */
    private $id_epreuve;

    public function __construct()
    {
        $this->id_epreuve = new ArrayCollection();
        $this->id_personnel = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getResultat(): ?int
    {
        return $this->resultat;
    }

    public function setResultat(int $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * @return Collection|personnel[]
     */
    public function getIdPersonnel(): Collection
    {
        return $this->id_personnel;
    }

    public function addIdPersonnel(personnel $idPersonnel): self
    {
        if (!$this->id_personnel->contains($idPersonnel)) {
            $this->id_personnel[] = $idPersonnel;
            $idPersonnel->setIdValidation($this);
        }

        return $this;
    }

    public function removeIdPersonnel(personnel $idPersonnel): self
    {
        if ($this->id_personnel->removeElement($idPersonnel)) {
            // set the owning side to null (unless already changed)
            if ($idPersonnel->getIdValidation() === $this) {
                $idPersonnel->setIdValidation(null);
            }
        }

        return $this;
    }

    public function getIdEpreuve(): ?epreuve
    {
        return $this->id_epreuve;
    }

    public function setIdEpreuve(?epreuve $id_epreuve): self
    {
        $this->id_epreuve = $id_epreuve;

        return $this;
    }

}
