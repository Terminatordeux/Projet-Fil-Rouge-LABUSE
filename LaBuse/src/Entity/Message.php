<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre_mess;

    #[ORM\Column(type: 'text', nullable: true)]
    private $texte_mess;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date_messe;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $message_valide;

    #[ORM\ManyToOne(targetEntity: Annonce::class, inversedBy: 'messages')]
    private $annonce;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'messages')]
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreMess(): ?string
    {
        return $this->titre_mess;
    }

    public function setTitreMess(?string $titre_mess): self
    {
        $this->titre_mess = $titre_mess;

        return $this;
    }

    public function getTexteMess(): ?string
    {
        return $this->texte_mess;
    }

    public function setTexteMess(?string $texte_mess): self
    {
        $this->texte_mess = $texte_mess;

        return $this;
    }

    public function getDateMesse(): ?\DateTimeInterface
    {
        return $this->date_messe;
    }

    public function setDateMesse(?\DateTimeInterface $date_messe): self
    {
        $this->date_messe = $date_messe;

        return $this;
    }

    public function isMessageValide(): ?bool
    {
        return $this->message_valide;
    }

    public function setMessageValide(?bool $message_valide): self
    {
        $this->message_valide = $message_valide;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

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
}
