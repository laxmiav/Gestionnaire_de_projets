<?php

namespace App\Entity;

use App\Repository\TasksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TasksRepository::class)]
class Tasks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Deadline_date = null;

    #[ORM\Column(nullable: true)]
    private ?int $Priority = null;

    #[ORM\Column(nullable: true)]
    private ?int $Status = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    private ?Projets $Project = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDeadlineDate(): ?\DateTimeInterface
    {
        return $this->Deadline_date;
    }

    public function setDeadlineDate(?\DateTimeInterface $Deadline_date): self
    {
        $this->Deadline_date = $Deadline_date;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->Priority;
    }

    public function setPriority(?int $Priority): self
    {
        $this->Priority = $Priority;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(?int $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getProject(): ?Projets
    {
        return $this->Project;
    }

    public function setProject(?Projets $Project): self
    {
        $this->Project = $Project;

        return $this;
    }
}
