<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $etudaint_id = null;

    #[ORM\Column]
    private ?int $module_id = null;

    #[ORM\Column]
    private ?float $note = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Etudiant $etudiant = null;

    #[ORM\ManyToOne(inversedBy: 'note')]
    private ?Module $module = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtudaintId(): ?int
    {
        return $this->etudaint_id;
    }

    public function setEtudaintId(int $etudaint_id): self
    {
        $this->etudaint_id = $etudaint_id;

        return $this;
    }

    public function getModuleId(): ?int
    {
        return $this->module_id;
    }

    public function setModuleId(int $module_id): self
    {
        $this->module_id = $module_id;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): self
    {
        $this->module = $module;

        return $this;
    }
}
