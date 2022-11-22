<?php

namespace App\Entity;

use App\Repository\FormerRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormerRepository::class)]
class Former
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['session', 'tt'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['session', 'tt'])]
    private ?string $name_former = null;

    #[ORM\Column(length: 50)]
    #[Groups(['session', "tt"])]
    private ?string $first_name_former = null;

    #[ORM\Column(length: 50)]
    #[Groups(["tt", "session"])]
    private ?string $mail_former = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(["tt", "session"])]
    private ?string $img_former = null;
    
    #[ORM\ManyToOne(inversedBy: 'formers', targetEntity: TypeFormer::class)]
    #[Groups(["tt"])]
    private ?TypeFormer $id_type_former = null;

    #[ORM\OneToMany(mappedBy: 'id_former', targetEntity: Session::class)]
    private Collection $sessions;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
        $this->id_type_session = new ArrayCollection();
        $this->session = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameFormer(): ?string
    {
        return $this->name_former;
    }

    public function setNameFormer(string $name_former): self
    {
        $this->name_former = $name_former;

        return $this;
    }

    public function getFirstNameFormer(): ?string
    {
        return $this->first_name_former;
    }

    public function setFirstNameFormer(string $first_name_former): self
    {
        $this->first_name_former = $first_name_former;

        return $this;
    }

    public function getMailFormer(): ?string
    {
        return $this->mail_former;
    }

    public function setMailFormer(string $mail_former): self
    {
        $this->mail_former = $mail_former;

        return $this;
    }

    public function getImgFormer(): ?string
    {
        return $this->img_former;
    }

    public function setImgFormer(?string $img_former): self
    {
        $this->img_former = $img_former;

        return $this;
    }

    public function getIdTypeFormer(): ?TypeFormer
    {
        return $this->id_type_former;
    }

    public function setIdTypeFormer(?TypeFormer $id_type_former): self
    {
        $this->id_type_former = $id_type_former;

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
            $session->setIdFormer($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getIdFormer() === $this) {
                $session->setIdFormer(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->name_former;
    }
}
