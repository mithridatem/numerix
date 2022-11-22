<?php

namespace App\Entity;

use App\Repository\RequestContactRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RequestContactRepository::class)]
class RequestContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['request'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['request'])]
    private ?string $subject_request_contact = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['request'])]
    private ?string $content_request_contact = null;

    #[ORM\Column(length: 10, nullable: true)]
    #[Groups(['request'])]
    private ?string $phone_request_contact = null;

    #[ORM\Column(length: 50)]
    #[Groups(['request'])]
    private ?string $mail_request_contact = null;

    #[ORM\Column(length: 50)]
    #[Groups(['request'])]
    private ?string $company_name_request_contact = null;

    #[ORM\ManyToOne(inversedBy: 'requestContacts')]
    #[Groups(['request'])]
    private ?RequestType $id_request_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubjectRequestContact(): ?string
    {
        return $this->subject_request_contact;
    }

    public function setSubjectRequestContact(string $subject_request_contact): self
    {
        $this->subject_request_contact = $subject_request_contact;

        return $this;
    }

    public function getContentRequestContact(): ?string
    {
        return $this->content_request_contact;
    }

    public function setContentRequestContact(string $content_request_contact): self
    {
        $this->content_request_contact = $content_request_contact;

        return $this;
    }

    public function getPhoneRequestContact(): ?string
    {
        return $this->phone_request_contact;
    }

    public function setPhoneRequestContact(?string $phone_request_contact): self
    {
        $this->phone_request_contact = $phone_request_contact;

        return $this;
    }

    public function getMailRequestContact(): ?string
    {
        return $this->mail_request_contact;
    }

    public function setMailRequestContact(string $mail_request_contact): self
    {
        $this->mail_request_contact = $mail_request_contact;

        return $this;
    }

    public function getCompanyNameRequestContact(): ?string
    {
        return $this->company_name_request_contact;
    }

    public function setCompanyNameRequestContact(string $company_name_request_contact): self
    {
        $this->company_name_request_contact = $company_name_request_contact;

        return $this;
    }

    public function getIdRequestType(): ?RequestType
    {
        return $this->id_request_type;
    }

    public function setIdRequestType(?RequestType $id_request_type): self
    {
        $this->id_request_type = $id_request_type;

        return $this;
    }
}
