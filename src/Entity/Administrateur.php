<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]
class Administrateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nameAdm = null;

    #[ORM\Column(length: 50)]
    private ?string $mailAdm = null;

    #[ORM\Column(length: 100)]
    private ?string $passwordAdm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameAdm(): ?string
    {
        return $this->nameAdm;
    }

    public function setNameAdm(string $nameAdm): self
    {
        $this->nameAdm = $nameAdm;

        return $this;
    }

    public function getMailAdm(): ?string
    {
        return $this->mailAdm;
    }

    public function setMailAdm(string $mailAdm): self
    {
        $this->mailAdm = $mailAdm;

        return $this;
    }

    public function getPasswordAdm(): ?string
    {
        return $this->passwordAdm;
    }

    public function setPasswordAdm(string $passwordAdm): self
    {
        $this->passwordAdm = $passwordAdm;

        return $this;
    }
}
