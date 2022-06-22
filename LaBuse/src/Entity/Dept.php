<?php

namespace App\Entity;

use App\Repository\DeptRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeptRepository::class)]
class Dept
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $num_dept;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nom_dept;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Region_dept;

    #[ORM\OneToMany(mappedBy: 'dept', targetEntity: Adresse::class)]
    private $adresses;

    public function __construct()
    {
        $this->adresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumDept(): ?int
    {
        return $this->num_dept;
    }

    public function setNumDept(?int $num_dept): self
    {
        $this->num_dept = $num_dept;

        return $this;
    }

    public function getNomDept(): ?string
    {
        return $this->nom_dept;
    }

    public function setNomDept(?string $nom_dept): self
    {
        $this->nom_dept = $nom_dept;

        return $this;
    }

    public function getRegionDept(): ?string
    {
        return $this->Region_dept;
    }

    public function setRegionDept(?string $Region_dept): self
    {
        $this->Region_dept = $Region_dept;

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Adresse $adress): self
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses[] = $adress;
            $adress->setDept($this);
        }

        return $this;
    }

    public function removeAdress(Adresse $adress): self
    {
        if ($this->adresses->removeElement($adress)) {
            // set the owning side to null (unless already changed)
            if ($adress->getDept() === $this) {
                $adress->setDept(null);
            }
        }

        return $this;
    }
}
