<?php

namespace App\Entity;

use App\Repository\TraineeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TraineeRepository::class)]
class Trainee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name_trainee = null;

    #[ORM\Column(length: 50)]
    private ?string $first_name_trainee = null;

    #[ORM\Column(length: 50)]
    private ?string $img_trainee = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mail_trainee = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $phone_trainee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTrainee(): ?string
    {
        return $this->name_trainee;
    }

    public function setNameTrainee(string $name_trainee): self
    {
        $this->name_trainee = $name_trainee;

        return $this;
    }

    public function getFirstNameTrainee(): ?string
    {
        return $this->first_name_trainee;
    }

    public function setFirstNameTrainee(string $first_name_trainee): self
    {
        $this->first_name_trainee = $first_name_trainee;

        return $this;
    }

    public function getImgTrainee(): ?string
    {
        return $this->img_trainee;
    }

    public function setImgTrainee(string $img_trainee): self
    {
        $this->img_trainee = $img_trainee;

        return $this;
    }

    public function getMailTrainee(): ?string
    {
        return $this->mail_trainee;
    }

    public function setMailTrainee(?string $mail_trainee): self
    {
        $this->mail_trainee = $mail_trainee;

        return $this;
    }

    public function getPhoneTrainee(): ?string
    {
        return $this->phone_trainee;
    }

    public function setPhoneTrainee(?string $phone_trainee): self
    {
        $this->phone_trainee = $phone_trainee;

        return $this;
    }

}
