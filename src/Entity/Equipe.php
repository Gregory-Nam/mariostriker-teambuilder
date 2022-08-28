<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipeRepository::class)
 */
class Equipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PersonnageEquipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $DEFENSEUR;

    /**
     * @ORM\ManyToOne(targetEntity=PersonnageEquipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $MILLIEU1;

    /**
     * @ORM\ManyToOne(targetEntity=PersonnageEquipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $MILLIEU2;

    /**
     * @ORM\ManyToOne(targetEntity=PersonnageEquipement::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $CAPITAINE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TYPE;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="equipes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CREATEUR;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NOM_EQUIPE;

    /**
     * @ORM\Column(type="integer", options={"default":"0"})
     */
    private $UPVOTE;

    /**
     * @ORM\Column(type="integer", options={"default":"0"})
     */
    private $DOWNVOTE;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $DATE;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDEFENSEUR(): ?PersonnageEquipement
    {
        return $this->DEFENSEUR;
    }

    public function setDEFENSEUR(?PersonnageEquipement $DEFENSEUR): self
    {
        $this->DEFENSEUR = $DEFENSEUR;

        return $this;
    }

    public function getMILLIEU1(): ?PersonnageEquipement
    {
        return $this->MILLIEU1;
    }

    public function setMILLIEU1(?PersonnageEquipement $MILLIEU1): self
    {
        $this->MILLIEU1 = $MILLIEU1;

        return $this;
    }

    public function getMILLIEU2(): ?PersonnageEquipement
    {
        return $this->MILLIEU2;
    }

    public function setMILLIEU2(?PersonnageEquipement $MILLIEU2): self
    {
        $this->MILLIEU2 = $MILLIEU2;

        return $this;
    }

    public function getCAPITAINE(): ?PersonnageEquipement
    {
        return $this->CAPITAINE;
    }

    public function setCAPITAINE(?PersonnageEquipement $CAPITAINE): self
    {
        $this->CAPITAINE = $CAPITAINE;

        return $this;
    }

    public function getTYPE(): ?string
    {
        return $this->TYPE;
    }

    public function setTYPE(?string $TYPE): self
    {
        $this->TYPE = $TYPE;

        return $this;
    }

    public function getCREATEUR(): ?User
    {
        return $this->CREATEUR;
    }

    public function setCREATEUR(?User $CREATEUR): self
    {
        $this->CREATEUR = $CREATEUR;

        return $this;
    }

    public function getNOMEQUIPE(): ?string
    {
        return $this->NOM_EQUIPE;
    }

    public function setNOMEQUIPE(string $NOM_EQUIPE): self
    {
        $this->NOM_EQUIPE = $NOM_EQUIPE;

        return $this;
    }

    public function getUPVOTE(): ?int
    {
        return $this->UPVOTE;
    }

    public function setUPVOTE(int $UPVOTE): self
    {
        $this->UPVOTE = $UPVOTE;

        return $this;
    }

    public function getDOWNVOTE(): ?int
    {
        return $this->DOWNVOTE;
    }

    public function setDOWNVOTE(int $DOWNVOTE): self
    {
        $this->DOWNVOTE = $DOWNVOTE;

        return $this;
    }

    public function getDATE(): ?\DateTimeInterface
    {
        return $this->DATE;
    }

    public function setDATE(\DateTimeInterface $DATE): self
    {
        $this->DATE = $DATE;

        return $this;
    }
}
