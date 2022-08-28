<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipementRepository::class)
 */
class Equipement
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
     * @ORM\Column(type="string", length=255)
     */
    private $CATEGORIE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TYPE;

    /**
     * @ORM\Column(type="integer")
     */
    private $FORCE_DIFF;

    /**
     * @ORM\Column(type="integer")
     */
    private $VITESSE_DIFF;

    /**
     * @ORM\Column(type="integer")
     */
    private $TIR_DIFF;

    /**
     * @ORM\Column(type="integer")
     */
    private $PASSE_DIFF;

    /**
     * @ORM\Column(type="integer")
     */
    private $TECHNIQUE_DIFF;

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

    public function getCATEGORIE(): ?string
    {
        return $this->CATEGORIE;
    }

    public function setCATEGORIE(string $CATEGORIE): self
    {
        $this->CATEGORIE = $CATEGORIE;

        return $this;
    }

    public function getTYPE(): ?string
    {
        return $this->TYPE;
    }

    public function setTYPE(string $TYPE): self
    {
        $this->TYPE = $TYPE;

        return $this;
    }

    public function getFORCEDIFF(): ?int
    {
        return $this->FORCE_DIFF;
    }

    public function setFORCEDIFF(int $FORCE_DIFF): self
    {
        $this->FORCE_DIFF = $FORCE_DIFF;

        return $this;
    }

    public function getVITESSEDIFF(): ?int
    {
        return $this->VITESSE_DIFF;
    }

    public function setVITESSEDIFF(int $VITESSE_DIFF): self
    {
        $this->VITESSE_DIFF = $VITESSE_DIFF;

        return $this;
    }

    public function getTIRDIFF(): ?int
    {
        return $this->TIR_DIFF;
    }

    public function setTIRDIFF(int $TIR_DIFF): self
    {
        $this->TIR_DIFF = $TIR_DIFF;

        return $this;
    }

    public function getPASSEDIFF(): ?int
    {
        return $this->PASSE_DIFF;
    }

    public function setPASSEDIFF(int $PASSE_DIFF): self
    {
        $this->PASSE_DIFF = $PASSE_DIFF;

        return $this;
    }

    public function getTECHNIQUEDIFF(): ?int
    {
        return $this->TECHNIQUE_DIFF;
    }

    public function setTECHNIQUEDIFF(int $TECHNIQUE_DIFF): self
    {
        $this->TECHNIQUE_DIFF = $TECHNIQUE_DIFF;

        return $this;
    }
}
