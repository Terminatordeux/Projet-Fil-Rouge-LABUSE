<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre_ann;

    #[ORM\Column(type: 'text', nullable: true)]
    private $texte_ann;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_ann;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $type_ann;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $annonce_valide;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'annonces')]
    private $type;

    #[ORM\ManyToOne(targetEntity: Etat::class, inversedBy: 'annonces')]
    private $etat;

    #[ORM\ManyToOne(targetEntity: Technologie::class, inversedBy: 'annonces')]
    private $techno;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'annonces')]
    private $utilisateur;

    #[ORM\ManyToOne(targetEntity: Adresse::class, inversedBy: 'annonces')]
    private $adresse;

    #[ORM\ManyToOne(targetEntity: Marque::class, inversedBy: 'annonces')]
    private $marque;

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: Message::class)]
    private $messages;

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: Photo::class)]
    private $photo;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->photo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreAnn(): ?string
    {
        return $this->titre_ann;
    }

    public function setTitreAnn(?string $titre_ann): self
    {
        $this->titre_ann = $titre_ann;

        return $this;
    }

    public function getTexteAnn(): ?string
    {
        return $this->texte_ann;
    }

    public function setTexteAnn(?string $texte_ann): self
    {
        $this->texte_ann = $texte_ann;

        return $this;
    }

    public function getDateAnn(): ?\DateTimeInterface
    {
        return $this->date_ann;
    }

    public function setDateAnn(?\DateTimeInterface $date_ann): self
    {
        $this->date_ann = $date_ann;

        return $this;
    }

    public function getTypeAnn(): ?string
    {
        return $this->type_ann;
    }

    public function setTypeAnn(?string $type_ann): self
    {
        $this->type_ann = $type_ann;

        return $this;
    }

    public function isAnnonceValide(): ?bool
    {
        return $this->annonce_valide;
    }

    public function setAnnonceValide(?bool $annonce_valide): self
    {
        $this->annonce_valide = $annonce_valide;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getTechno(): ?Technologie
    {
        return $this->techno;
    }

    public function setTechno(?Technologie $techno): self
    {
        $this->techno = $techno;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setAnnonce($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getAnnonce() === $this) {
                $message->setAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo[] = $photo;
            $photo->setAnnonce($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getAnnonce() === $this) {
                $photo->setAnnonce(null);
            }
        }

        return $this;
    }
}
