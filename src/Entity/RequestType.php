<?php

namespace App\Entity;

use App\Repository\RequestTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RequestTypeRepository::class)]
class RequestType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['request'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['request'])]
    private ?string $name_request_type = null;

    #[ORM\OneToMany(mappedBy: 'id_request_type', targetEntity: RequestContact::class)]
    private Collection $requestContacts;

    public function __construct()
    {
        $this->requestContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRequestType(): ?string
    {
        return $this->name_request_type;
    }

    public function setNameRequestType(string $name_request_type): self
    {
        $this->name_request_type = $name_request_type;

        return $this;
    }

    /**
     * @return Collection<int, RequestContact>
     */
    public function getRequestContacts(): Collection
    {
        return $this->requestContacts;
    }

    public function addRequestContact(RequestContact $requestContact): self
    {
        if (!$this->requestContacts->contains($requestContact)) {
            $this->requestContacts->add($requestContact);
            $requestContact->setIdRequestType($this);
        }

        return $this;
    }

    public function removeRequestContact(RequestContact $requestContact): self
    {
        if ($this->requestContacts->removeElement($requestContact)) {
            // set the owning side to null (unless already changed)
            if ($requestContact->getIdRequestType() === $this) {
                $requestContact->setIdRequestType(null);
            }
        }

        return $this;
    }
}
