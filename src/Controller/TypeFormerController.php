<?php

namespace App\Controller;
use App\Entity\TypeFormer;
use App\Repository\TypeFormerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;
use Doctrine\ORM\EntityManagerInterface;

class TypeFormerController extends AbstractController
{
    #[Route('/type/former', name: 'app_type_former', methods:'GET')]
    public function index(TypeFormerRepository $type): Response{
        $data = $type->findAll();
        
        return $this->json($type->findAll(),200, ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'tt']);
    }
}
