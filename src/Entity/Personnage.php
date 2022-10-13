<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NOM;

    /**
     * @ORM\Column(type="integer")
     */
    private $FORCE_V;

    /**
     * @ORM\Column(type="integer")
     */
    private $VITESSE_V;

    /**
     * @ORM\Column(type="integer")
     */
    private $TIR_V;

    /**
     * @ORM\Column(type="integer")
     */
    private $PASSE_V;

    /**
     * @ORM\Column(type="integer")
     */
    private $TECHNIQUE_V;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IMAGE;

    /**
     * @ORM\OneToMany(targetEntity=PersonnageEquipement::class, mappedBy="PERSONNAGE")
     */
    private $personnageEquipements;

    public function __construct()
    {
        $this->personnageEquipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNOM(): ?string
    {
        return $this->NOM;
    }

    public function setNOM(string $NOM): self
    {
        $this->NOM = $NOM;

        return $this;
    }

    public function getFORCEV(): ?int
    {
        return $this->FORCE_V;
    }

    public function setFORCEV(int $FORCE_V): self
    {
        $this->FORCE_V = $FORCE_V;

        return $this;
    }

    public function getVITESSEV(): ?int
    {
        return $this->VITESSE_V;
    }

    public function setVITESSEV(int $VITESSE_V): self
    {
        $this->VITESSE_V = $VITESSE_V;

        return $this;
    }

    public function getTIRV(): ?int
    {
        return $this->TIR_V;
    }

    public function setTIRV(int $TIR_V): self
    {
        $this->TIR_V = $TIR_V;

        return $this;
    }

    public function getPASSEV(): ?int
    {
        return $this->PASSE_V;
    }

    public function setPASSEV(int $PASSE_V): self
    {
        $this->PASSE_V = $PASSE_V;

        return $this;
    }

    public function getTECHNIQUEV(): ?int
    {
        return $this->TECHNIQUE_V;
    }

    public function setTECHNIQUEV(int $TECHNIQUE_V): self
    {
        $this->TECHNIQUE = $TECHNIQUE_V;

        return $this;
    }

    public function getIMAGE(): ?string
    {
        return $this->IMAGE;
    }

    public function setIMAGE(string $IMAGE): self
    {
        $this->IMAGE = $IMAGE;

        return $this;
    }

    /**
     * @return Collection<int, PersonnageEquipement>
     */
    public function getPersonnageEquipements(): Collection
    {
        return $this->personnageEquipements;
    }

    public function addPersonnageEquipement(PersonnageEquipement $personnageEquipement): self
    {
        if (!$this->personnageEquipements->contains($personnageEquipement)) {
            $this->personnageEquipements[] = $personnageEquipement;
            $personnageEquipement->setPERSONNAGE($this);
        }

        return $this;
    }

    public function removePersonnageEquipement(PersonnageEquipement $personnageEquipement): self
    {
        if ($this->personnageEquipements->removeElement($personnageEquipement)) {
            // set the owning side to null (unless already changed)
            if ($personnageEquipement->getPERSONNAGE() === $this) {
                $personnageEquipement->setPERSONNAGE(null);
            }
        }

        return $this;
    }

    public function getStatsBase() : array{
        $diffStat = array("FORCE" => $this->getFORCEV(), 
        "VITESSE" => $this->getVITESSEV(),
        "PASSE" => 0, "TIR" => $this->getTIRV(), "TECHNIQUE" => $this->getTECHNIQUEV());
        return $diffStat;
    }
}
