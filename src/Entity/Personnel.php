<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PersonnelRepository::class)
 */
class Personnel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("epreuve:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("epreuve:read")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("epreuve:read")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=1)
     * @Groups("epreuve:read")
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups("epreuve:read")
     */
    private $nia;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("epreuve:read")
     */
    private $nni;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("epreuve:read")
     */
    private $nid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("epreuve:read")
     */
    private $nsap;

    /**
     * @ORM\Column(type="date")
     * @Groups("epreuve:read")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("epreuve:read")
     */
    private $lieu_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("epreuve:read")
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity=Epreuve::class, mappedBy="personnels")
     */
    private $epreuves;

    /**
     * @ORM\ManyToOne(targetEntity=Armee::class, inversedBy="personnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $armee;

    /**
     * @ORM\ManyToOne(targetEntity=Grade::class, inversedBy="personnels")
     */
    private $grade;

    /**
     * @ORM\ManyToOne(targetEntity=ValidationEpreuve::class, inversedBy="id_personnel")
     */
    private $id_validation;

    public function __construct()
    {
        $this->epreuves = new ArrayCollection();
        $this->id_validation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNia(): ?string
    {
        return $this->nia;
    }

    public function setNia(string $nia): self
    {
        $this->nia = $nia;

        return $this;
    }

    public function getNni(): ?string
    {
        return $this->nni;
    }

    public function setNni(string $nni): self
    {
        $this->nni = $nni;

        return $this;
    }

    public function getNid(): ?string
    {
        return $this->nid;
    }

    public function setNid(string $nid): self
    {
        $this->nid = $nid;

        return $this;
    }

    public function getNsap(): ?string
    {
        return $this->nsap;
    }

    public function setNsap(string $nsap): self
    {
        $this->nsap = $nsap;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieu_naissance;
    }

    public function setLieuNaissance(string $lieu_naissance): self
    {
        $this->lieu_naissance = $lieu_naissance;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Epreuve[]
     */
    public function getEpreuves(): Collection
    {
        return $this->epreuves;
    }

    public function addEpreufe(Epreuve $epreufe): self
    {
        if (!$this->epreuves->contains($epreufe)) {
            $this->epreuves[] = $epreufe;
            $epreufe->addPersonnel($this);
        }

        return $this;
    }

    public function removeEpreufe(Epreuve $epreufe): self
    {
        if ($this->epreuves->removeElement($epreufe)) {
            $epreufe->removePersonnel($this);
        }

        return $this;
    }

    public function getAge()
    {
        $dateInterval = $this->date_de_naissance->diff(new \DateTime());

        return $dateInterval->y;
    }

    public function __toString(): ?String
    {
        return $this->getNom();
    }

    public function getArmee(): ?Armee
    {
        return $this->armee;
    }

    public function setArmee(?Armee $armee): self
    {
        $this->armee = $armee;

        return $this;
    }

    public function getGrade(): ?Grade
    {
        return $this->grade;
    }

    public function setGrade(?Grade $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getIdValidation(): ?ValidationEpreuve
    {
        return $this->id_validation;
    }

    public function setIdValidation(?ValidationEpreuve $id_validation): self
    {
        $this->id_validation = $id_validation;

        return $this;
    }

}
