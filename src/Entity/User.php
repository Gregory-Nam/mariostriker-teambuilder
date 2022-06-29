<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Role;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nombre_equipe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Code_ami_switch;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Discord;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom_club;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Code_club;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->Role;
    }

    public function setRole(string $Role): self
    {
        $this->Role = $Role;

        return $this;
    }

    public function getNombreEquipe(): ?int
    {
        return $this->Nombre_equipe;
    }

    public function setNombreEquipe(int $Nombre_equipe): self
    {
        $this->Nombre_equipe = $Nombre_equipe;

        return $this;
    }

    public function getCodeAmiSwitch(): ?string
    {
        return $this->Code_ami_switch;
    }

    public function setCodeAmiSwitch(?string $Code_ami_switch): self
    {
        $this->Code_ami_switch = $Code_ami_switch;

        return $this;
    }

    public function getDiscord(): ?string
    {
        return $this->Discord;
    }

    public function setDiscord(?string $Discord): self
    {
        $this->Discord = $Discord;

        return $this;
    }

    public function getNomClub(): ?string
    {
        return $this->Nom_club;
    }

    public function setNomClub(?string $Nom_club): self
    {
        $this->Nom_club = $Nom_club;

        return $this;
    }

    public function getCodeClub(): ?string
    {
        return $this->Code_club;
    }

    public function setCodeClub(?string $Code_club): self
    {
        $this->Code_club = $Code_club;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): self
    {
        $this->Mail = $Mail;

        return $this;
    }
}
