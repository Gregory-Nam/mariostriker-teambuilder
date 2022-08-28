<?php

namespace App\Entity;

use App\Repository\PersonnageEquipementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageEquipementRepository::class)
 */
class PersonnageEquipement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personnage::class, inversedBy="personnageEquipements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PERSONNAGE;

    /**
     * @ORM\ManyToOne(targetEntity=Equipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $EQUIPEMENT1;

    /**
     * @ORM\ManyToOne(targetEntity=Equipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $EQUIPEMENT2;

    /**
     * @ORM\ManyToOne(targetEntity=Equipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Equipement3;

    /**
     * @ORM\ManyToOne(targetEntity=Equipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Equipement4;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPERSONNAGE(): ?Personnage
    {
        return $this->PERSONNAGE;
    }

    public function setPERSONNAGE(?Personnage $PERSONNAGE): self
    {
        $this->PERSONNAGE = $PERSONNAGE;

        return $this;
    }

    public function getEQUIPEMENT1(): ?Equipement
    {
        return $this->EQUIPEMENT1;
    }

    public function setEQUIPEMENT1(?Equipement $EQUIPEMENT1): self
    {
        $this->EQUIPEMENT1 = $EQUIPEMENT1;

        return $this;
    }

    public function getEQUIPEMENT2(): ?Equipement
    {
        return $this->EQUIPEMENT2;
    }

    public function setEQUIPEMENT2(?Equipement $EQUIPEMENT2): self
    {
        $this->EQUIPEMENT2 = $EQUIPEMENT2;

        return $this;
    }

    public function getEquipement3(): ?Equipement
    {
        return $this->Equipement3;
    }

    public function setEquipement3(?Equipement $Equipement3): self
    {
        $this->Equipement3 = $Equipement3;

        return $this;
    }

    public function getEquipement4(): ?Equipement
    {
        return $this->Equipement4;
    }

    public function setEquipement4(?Equipement $Equipement4): self
    {
        $this->Equipement4 = $Equipement4;

        return $this;
    }
}
