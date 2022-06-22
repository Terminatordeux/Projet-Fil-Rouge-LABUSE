<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $num_rue;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom_rue;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $complement_adresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $code_postal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ville;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Annonce::class)]
    private $annonces;

    #[ORM\ManyToOne(targetEntity: Dept::class, inversedBy: 'adresses')]
    private $dept;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumRue(): ?string
    {
        return $this->num_rue;
    }

    public function setNumRue(?string $num_rue): self
    {
        $this->num_rue = $num_rue;

        return $this;
    }

    public function getNomRue(): ?string
    {
        return $this->nom_rue;
    }

    public function setNomRue(?string $nom_rue): self
    {
        $this->nom_rue = $nom_rue;

        return $this;
    }

    public function getComplementAdresse(): ?string
    {
        return $this->complement_adresse;
    }

    public function setComplementAdresse(?string $complement_adresse): self
    {
        $this->complement_adresse = $complement_adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setAdresse($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getAdresse() === $this) {
                $annonce->setAdresse(null);
            }
        }

        return $this;
    }

    public function getDept(): ?Dept
    {
        return $this->dept;
    }

    public function setDept(?Dept $dept): self
    {
        $this->dept = $dept;

        return $this;
    }
}
