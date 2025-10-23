<?php

namespace App\Entity;

use App\Repository\HospitalmhadhbichaimaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HospitalmhadhbichaimaRepository::class)]
class Hospitalmhadhbichaima
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nbrch = null;

    /**
     * @var Collection<int, Chambremhadhbichaima>
     */
    #[ORM\OneToMany(targetEntity: Chambremhadhbichaima::class, mappedBy: 'Hospitalmhadhbichaima' , orphanRemoval: true)]
    private Collection $Hospitalmhadhbichaima;

    public function __construct()
    {
        $this->Hospitalmhadhbichaima = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbrch(): ?int
    {
        return $this->nbrch;
    }

    public function setNbrch(int $nbrch): static
    {
        $this->nbrch = $nbrch;

        return $this;
    }

    /**
     * @return Collection<int, Chambremhadhbichaima>
     */
    public function getHospital(): Collection
    {
        return $this->Hospitalmhadhbichaima;
    }

    public function addHospital(Chambremhadhbichaima $Hospitalmhadhbichaima): static
    {
        if (!$this->Hospitalmhadhbichaima->contains($Hospitalmhadhbichaima)) {
            $this->Hospitalmhadhbichaima->add($Hospitalmhadhbichaima);
            $Hospitalmhadhbichaima->setHospital($this);
        }

        return $this;
    }

    public function removeHospital(Chambremhadhbichaima $Hospitalmhadhbichaima): static
    {
        if ($this->Hospitalmhadhbichaima->removeElement($Hospitalmhadhbichaima)) {
            // set the owning side to null (unless already changed)
            if ($Hospitalmhadhbichaima->getHospital() === $this) {
                $Hospitalmhadhbichaima->setHospital(null);
            }
        }

        return $this;
    }
}
