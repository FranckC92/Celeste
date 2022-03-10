<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 36)]
    private $Commentaire;

    #[ORM\Column(type: 'string', length: 36)]
    private $commentaireID;

    #[ORM\Column(type: 'string', length: 36, nullable: true)]
    private $OnetoMany;

    #[ORM\Column(type: 'string', length: 50)]
    private $slug;

    #[ORM\Column(type: 'string', length: 50)]
    private $auteur;

    #[ORM\Column(type: 'string', length: 250)]
    private $contenu;

    #[ORM\Column(type: 'datetime')]
    private $dateCreation;

    #[ORM\Column(type: 'datetime')]
    private $dateModification;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'Activite')]
    private $parentId;

    #[ORM\OneToMany(mappedBy: 'parentId', targetEntity: self::class)]
    private $Activite;

    public function __construct()
    {
        $this->Activite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getCommentaireID(): ?string
    {
        return $this->commentaireID;
    }

    public function setCommentaireID(string $commentaireID): self
    {
        $this->commentaireID = $commentaireID;

        return $this;
    }

    public function getOnetoMany(): ?string
    {
        return $this->OnetoMany;
    }

    public function setOnetoMany(?string $OnetoMany): self
    {
        $this->OnetoMany = $OnetoMany;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(\DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    public function getParentId(): ?self
    {
        return $this->parentId;
    }

    public function setParentId(?self $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getActivite(): Collection
    {
        return $this->Activite;
    }

    public function addActivite(self $activite): self
    {
        if (!$this->Activite->contains($activite)) {
            $this->Activite[] = $activite;
            $activite->setParentId($this);
        }

        return $this;
    }

    public function removeActivite(self $activite): self
    {
        if ($this->Activite->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getParentId() === $this) {
                $activite->setParentId(null);
            }
        }

        return $this;
    }
}
