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
     * @ORM\JoinColumn(nullable=true)
     */
    private $EQUIPEMENT1;

    /**
     * @ORM\ManyToOne(targetEntity=Equipement::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $EQUIPEMENT2;

    /**
     * @ORM\ManyToOne(targetEntity=Equipement::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Equipement3;

    /**
     * @ORM\ManyToOne(targetEntity=Equipement::class)
     * @ORM\JoinColumn(nullable=true)
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
        return $this->EQUIPEMENT1 ?? new Equipement();
    }

    public function setEQUIPEMENT1(?Equipement $EQUIPEMENT1): self
    {
        $this->EQUIPEMENT1 = $EQUIPEMENT1;

        return $this;
    }

    public function getEQUIPEMENT2(): ?Equipement
    {
        return $this->EQUIPEMENT2 ?? new Equipement(); ;
    }

    public function setEQUIPEMENT2(?Equipement $EQUIPEMENT2): self
    {
        $this->EQUIPEMENT2 = $EQUIPEMENT2;

        return $this;
    }

    public function getEquipement3(): ?Equipement
    {
        return $this->Equipement3 ?? new Equipement();;
    }

    public function setEquipement3(?Equipement $Equipement3): self
    {
        $this->Equipement3 = $Equipement3;

        return $this;
    }

    public function getEquipement4(): ?Equipement
    {
        return $this->Equipement4 ?? new Equipement();
    }

    public function setEquipement4(?Equipement $Equipement4): self
    {
        $this->Equipement4 = $Equipement4;

        return $this;
    }

    public function getDiffStat() : array{
        $diffStat = array("FORCE" => 0, "VITESSE" => 0, "PASSE" => 0, "TIR" => 0, "TECHNIQUE" => 0);

        $diffStat['FORCE'] = $this->getEQUIPEMENT1()->getFORCEDIFF() + $this->getEQUIPEMENT2()->getFORCEDIFF() +
        $this->getEquipement3()->getFORCEDIFF() + $this->getEquipement4()->getFORCEDIFF();
        $diffStat['VITESSE'] = $this->getEQUIPEMENT1()->getVITESSEDIFF() + $this->getEQUIPEMENT2()->getVITESSEDIFF() +
        $this->getEquipement3()->getVITESSEDIFF() + $this->getEquipement4()->getVITESSEDIFF();
        $diffStat['PASSE'] = $this->getEQUIPEMENT1()->getPASSEDIFF() + $this->getEQUIPEMENT2()->getPASSEDIFF() +
        $this->getEquipement3()->getPASSEDIFF() + $this->getEquipement4()->getPASSEDIFF();
        $diffStat['TIR'] = $this->getEQUIPEMENT1()->getTIRDIFF() + $this->getEQUIPEMENT2()->getTIRDIFF() +
        $this->getEquipement3()->getTIRDIFF() + $this->getEquipement4()->getFORCEDIFF();
        $diffStat['TECHNIQUE'] = $this->getEQUIPEMENT1()->getTECHNIQUEDIFF() + $this->getEQUIPEMENT2()->getTECHNIQUEDIFF() +
        $this->getEquipement3()->getTECHNIQUEDIFF() + $this->getEquipement4()->getTECHNIQUEDIFF();

        return $diffStat;

    }

    public function getEquipementsNames() : array {
        return array($this->getEQUIPEMENT1()->getNOM(),$this->getEQUIPEMENT2()->getNOM(), $this->getEquipement3()->getNOM(), $this->getEquipement4()->getNOM());
    }
}
