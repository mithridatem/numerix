<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['session', 'skill'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['session', 'skill'])]
    private ?string $name_skill = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['session', 'skill'])]
    private ?string $desc_short_skill = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['session', 'skill'])]
    private ?string $desc_long_skill = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['session', 'skill'])]
    private ?string $img_skill = null;

    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'skills')]
    private Collection $sessions;

    
    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSkill(): ?string
    {
        return $this->name_skill;
    }

    public function setNameSkill(string $name_skill): self
    {
        $this->name_skill = $name_skill;

        return $this;
    }

    public function getDescShortSkill(): ?string
    {
        return $this->desc_short_skill;
    }

    public function setDescShortSkill(?string $desc_short_skill): self
    {
        $this->desc_short_skill = $desc_short_skill;

        return $this;
    }

    public function getDescLongSkill(): ?string
    {
        return $this->desc_long_skill;
    }

    public function setDescLongSkill(?string $desc_long_skill): self
    {
        $this->desc_long_skill = $desc_long_skill;

        return $this;
    }

    public function getImgSkill(): ?string
    {
        return $this->img_skill;
    }

    public function setImgSkill(?string $img_skill): self
    {
        $this->img_skill = $img_skill;

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
            $session->addSkill($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            $session->removeSkill($this);
        }

        return $this;
    }
    public function __toString(){
        return $this->name_skill;
    }
    
}
