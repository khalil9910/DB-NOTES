<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ensignement_id = null;

    #[ORM\Column]
    private ?int $filiere_id = null;

    #[ORM\Column]
    private ?int $semestre_id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'module', targetEntity: Note::class)]
    private Collection $note;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    private ?Semestre $semestere = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    private ?Filiere $filiere = null;

    #[ORM\ManyToOne(inversedBy: 'modules')]
    private ?Ensignement $ensignement = null;

    public function __construct()
    {
        $this->note = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnsignementId(): ?int
    {
        return $this->ensignement_id;
    }

    public function setEnsignementId(int $ensignement_id): self
    {
        $this->ensignement_id = $ensignement_id;

        return $this;
    }

    public function getFiliereId(): ?int
    {
        return $this->filiere_id;
    }

    public function setFiliereId(int $filiere_id): self
    {
        $this->filiere_id = $filiere_id;

        return $this;
    }

    public function getSemestreId(): ?int
    {
        return $this->semestre_id;
    }

    public function setSemestreId(int $semestre_id): self
    {
        $this->semestre_id = $semestre_id;

        return $this;
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

    /**
     * @return Collection<int, Note>
     */
    public function getNote(): Collection
    {
        return $this->note;
    }

    public function addNote(Note $note): self
    {
        if (!$this->note->contains($note)) {
            $this->note->add($note);
            $note->setModule($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->note->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getModule() === $this) {
                $note->setModule(null);
            }
        }

        return $this;
    }

    public function getSemestere(): ?Semestre
    {
        return $this->semestere;
    }

    public function setSemestere(?Semestre $semestere): self
    {
        $this->semestere = $semestere;

        return $this;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getEnsignement(): ?Ensignement
    {
        return $this->ensignement;
    }

    public function setEnsignement(?Ensignement $ensignement): self
    {
        $this->ensignement = $ensignement;

        return $this;
    }
}
