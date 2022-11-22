<?php

namespace App\Controller;
use App\Entity\Skill;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Doctrine\ORM\EntityManagerInterface;
class SkillController extends AbstractController
{
    #[Route('/skill', name: 'app_skill')]
    public function getSkill(
        NormalizerInterface $normalizer,
        SkillRepository $skillRepo
        ): Response{
            return $this->json($skillRepo->findAll(),200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], 
            ['groups' => 'skill']);
    }    
}

