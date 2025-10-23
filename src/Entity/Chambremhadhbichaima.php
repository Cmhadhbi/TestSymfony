<?php

namespace App\Entity;

use App\Repository\ChambremhadhbichaimaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChambremhadhbichaimaRepository::class)]
class Chambremhadhbichaima
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numch = null;

    #[ORM\Column(length: 50)]
    private ?string $patient = null;

    #[ORM\ManyToOne(inversedBy: 'Chambremhadhbichaima')]
    #[ORM\JoinColumn(name: "Hospitalmhadhbichaima_id", referencedColumnName: "id", onDelete: "CASCADE")]
    private ?Hospitalmhadhbichaima $Hospitalmhadhbichaima = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumch(): ?int
    {
        return $this->numch;
    }

    public function setNumch(int $numch): static
    {
        $this->numch = $numch;

        return $this;
    }

    public function getPatient(): ?string
    {
        return $this->patient;
    }

    public function setPatient(string $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getHospital(): ?Hospitalmhadhbichaima
    {
        return $this->Hospitalmhadhbichaima;
    }

    public function setHospital(?Hospitalmhadhbichaima $Hospitalmhadhbichaima): static
    {
        $this->Hospitalmhadhbichaima = $Hospitalmhadhbichaima;

        return $this;
    }
}
