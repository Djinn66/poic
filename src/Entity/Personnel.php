<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnelRepository::class)
 */
class Personnel
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $nia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nsap;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu_naissance;

    /**
     * @ORM\Column(type="string", length=255)
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

    public function __construct()
    {
        $this->epreuves = new ArrayCollection();
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
        $this->nom = strtoupper($nom);

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = ucfirst(strtolower($prenom));

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
        $this->lieu_naissance = ucfirst(strtolower($lieu_naissance));

        return $this;
    }

    public function getEmail(): ?string
    {
        return str_replace("@intradef.gouv.fr","",$this->email);
    }

    public function setEmail(string $email): self
    {
        $this->email = $email."@intradef.gouv.fr";

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
}
