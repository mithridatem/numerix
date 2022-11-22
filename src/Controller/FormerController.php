<?php

namespace App\Controller;
use App\Entity\Former;
use App\Repository\FormerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Doctrine\ORM\EntityManagerInterface;
class FormerController extends AbstractController
{
    #[Route('/former', name: 'app_former', methods:'GET')]
    public function index(
        FormerRepository $formerRepository,
        NormalizerInterface $normalizer): Response 
    {
        $data = $formerRepository->findAll();
        return $this->json($data,200, ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'],
        ['groups' => 'tt']);
    }
}