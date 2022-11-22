<?php

namespace App\Entity;

use App\Repository\TypeFormerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeFormerRepository::class)]
class TypeFormer
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["tt"],['session'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(["tt"],['session'])]
    private ?string $name_type_former = null;

    #[ORM\OneToMany(mappedBy: 'id_type_former', targetEntity: Former::class)]
    private Collection $formers; 

    public function __construct()
    {
        $this->formers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTypeFormer(): ?string
    {
        return $this->name_type_former;
    }

    public function setNameTypeFormer(string $name_type_former): self
    {
        $this->name_type_former = $name_type_former;

        return $this;
    }

    /**
     * @return Collection<int, Former>
     */
    public function getFormers(): Collection
    {
        return $this->formers;
    }

    public function addFormer(Former $former): self
    {
        if (!$this->formers->contains($former)) {
            $this->formers->add($former);
            $former->setIdTypeFormer($this);
        }

        return $this;
    }

    public function removeFormer(Former $former): self
    {
        if ($this->formers->removeElement($former)) {
            // set the owning side to null (unless already changed)
            if ($former->getIdTypeFormer() === $this) {
                $former->setIdTypeFormer(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->name_type_former;
    }
}
