<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Entity\TypeSession;
use App\Repository\TypeSessionRepository;
use Doctrine\ORM\EntityManagerInterface;


class TypeSessionController extends AbstractController
{
    #[Route('/type/session', name: 'app_type_session')]
    public function index(): Response
    {
        return $this->render('type_session/index.html.twig', [
            'controller_name' => 'TypeSessionController',
        ]);
    }
    //retourne la liste des filières (typeSession) (erreur ok)
    #[Route('/type/session/all', name: 'app_type_session')]
    public function getTypeSession(
        TypeSessionRepository $type
        ): Response{
            $value = $type->findAll();
            //test si il n'y à pas de filière json -> erreur 
            if(empty($value)){
                return $this->json(['error'=>'Il n\'y à pas de Filière'],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //Sinon retourne la liste des filières -> json filière
            else{
                return $this->json($value,200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            }
    }
}
