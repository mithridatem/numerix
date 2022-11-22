<?php

namespace App\Entity;

use App\Repository\TypeSessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeSessionRepository::class)]
class TypeSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['session'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['session'])]
    private ?string $name_type_session = null;

    #[ORM\OneToMany(mappedBy: 'id_type_session', targetEntity: Session::class)]
    private Collection $sessions;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTypeSession(): ?string
    {
        return $this->name_type_session;
    }

    public function setNameTypeSession(string $name_type_session): self
    {
        $this->name_type_session = $name_type_session;

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->setIdTypeSession($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getIdTypeSession() === $this) {
                $session->setIdTypeSession(null);
            }
        }

        return $this;
    }
    
    public function __toString(){
        return $this->name_type_session;
    }
}
