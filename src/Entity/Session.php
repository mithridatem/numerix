<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['session'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['session'])]
    private ?string $name_session = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['session'])]
    private ?string $desc_short_session = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['session'])]
    private ?string $desc_long_session = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['session'])]
    private ?\DateTimeInterface $start_date_session = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['session'])]
    private ?\DateTimeInterface $end_date_session = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['session'])]
    private ?string $img_session = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['session'])]
    private ?string $blason_session = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['session'])]
    private ?\DateTimeInterface $start_stage1_session = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['session'])]
    private ?\DateTimeInterface $end_stage1_session = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['session'])]
    private ?\DateTimeInterface $start_stage2_session = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['session'])]
    private ?\DateTimeInterface $end_stage2_session = null;

    #[ORM\ManyToOne(inversedBy: 'session')]
    #[Groups(['session'])]
    private ?Former $id_former = null;

    #[ORM\ManyToOne]
    #[Groups(['session'])]
    private ?TypeSession $id_type_session = null;

    #[ORM\ManyToMany(targetEntity: Skill::class, inversedBy: 'sessions')]
    #[Groups(['session'])]
    private Collection $skills;

    #[ORM\Column(nullable: true)]
    #[Groups(['session'])]
    private ?int $nbr_stg_session = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['session'])]
    private ?int $nbr_place_session = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['session'])]
    private ?int $success_title_session = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['session'])]
    private ?int $occupation_integration_session = null;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSession(): ?string
    {
        return $this->name_session;
    }

    public function setNameSession(string $name_session): self
    {
        $this->name_session = $name_session;

        return $this;
    }

    public function getDescShortSession(): ?string
    {
        return $this->desc_short_session;
    }

    public function setDescShortSession(?string $desc_short_session): self
    {
        $this->desc_short_session = $desc_short_session;

        return $this;
    }

    public function getDescLongSession(): ?string
    {
        return $this->desc_long_session;
    }

    public function setDescLongSession(?string $desc_long_session): self
    {
        $this->desc_long_session = $desc_long_session;

        return $this;
    }

    public function getStartDateSession(): ?\DateTimeInterface
    {
        return $this->start_date_session;
    }

    public function setStartDateSession(?\DateTimeInterface $start_date_session): self
    {
        $this->start_date_session = $start_date_session;

        return $this;
    }

    public function getEndDateSession(): ?\DateTimeInterface
    {
        return $this->end_date_session;
    }

    public function setEndDateSession(?\DateTimeInterface $end_date_session): self
    {
        $this->end_date_session = $end_date_session;

        return $this;
    }

    public function getImgSession(): ?string
    {
        return $this->img_session;
    }

    public function setImgSession(?string $img_session): self
    {
        $this->img_session = $img_session;

        return $this;
    }

    public function getBlasonSession(): ?string
    {
        return $this->blason_session;
    }

    public function setBlasonSession(?string $blason_session): self
    {
        $this->blason_session = $blason_session;

        return $this;
    }

    public function getStartStage1Session(): ?\DateTimeInterface
    {
        return $this->start_stage1_session;
    }

    public function setStartStage1Session(?\DateTimeInterface $start_stage1_session): self
    {
        $this->start_stage1_session = $start_stage1_session;

        return $this;
    }

    public function getEndStage1Session(): ?\DateTimeInterface
    {
        return $this->end_stage1_session;
    }

    public function setEndStage1Session(?\DateTimeInterface $end_stage1_session): self
    {
        $this->end_stage1_session = $end_stage1_session;

        return $this;
    }

    public function getStartStage2Session(): ?\DateTimeInterface
    {
        return $this->start_stage2_session;
    }

    public function setStartStage2Session(?\DateTimeInterface $start_stage2_session): self
    {
        $this->start_stage2_session = $start_stage2_session;

        return $this;
    }

    public function getIdFormer(): ?Former
    {
        return $this->id_former;
    }

    public function setIdFormer(?Former $id_former): self
    {
        $this->id_former = $id_former;

        return $this;
    }

    public function getIdTypeSession(): ?TypeSession
    {
        return $this->id_type_session;
    }

    public function setIdTypeSession(?TypeSession $id_type_session): self
    {
        $this->id_type_session = $id_type_session;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }

    public function getNbrStgSession(): ?int
    {
        return $this->nbr_stg_session;
    }

    public function setNbrStgSession(?int $nbr_stg_session): self
    {
        $this->nbr_stg_session = $nbr_stg_session;

        return $this;
    }

    public function getNbrPlaceSession(): ?int
    {
        return $this->nbr_place_session;
    }

    public function setNbrPlaceSession(?int $nbr_place_session): self
    {
        $this->nbr_place_session = $nbr_place_session;

        return $this;
    }

    public function getSuccessTitleSession(): ?int
    {
        return $this->success_title_session;
    }

    public function setSuccessTitleSession(?int $success_title_session): self
    {
        $this->success_title_session = $success_title_session;

        return $this;
    }

    public function getOccupationIntegrationSession(): ?int
    {
        return $this->occupation_integration_session;
    }

    public function setOccupationIntegrationSession(?int $occupation_integration_session): self
    {
        $this->occupation_integration_session = $occupation_integration_session;

        return $this;
    }

    public function getEndStage2Session(): ?\DateTimeInterface
    {
        return $this->end_stage2_session;
    }

    public function setEndStage2Session(?\DateTimeInterface $end_stage2_session): self
    {
        $this->end_stage2_session = $end_stage2_session;

        return $this;
    }

}
