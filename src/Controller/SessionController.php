<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Entity\Session;
use App\Repository\SessionRepository;
use App\Repository\TypeSessionRepository;
use Doctrine\ORM\EntityManagerInterface;

class SessionController extends AbstractController
{
    #[Route('/all/session', name: 'app_accueil')]
    public function index(SessionRepository $session): Response
    {
        $sessions = $session->findAll();
        
        return $this->render('session/index.html.twig', 
        ['all' => $sessions]);
    }
    
    
    #[Route('/session', name: 'app_session', methods: 'GET')]
    public function getSession(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo
        ): Response{
            //dd($contactRepo->findAll());
            return $this->json($sessionRepo->findAll(),200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
    }
    #[Route('/sessionOne', name: 'app_session_One', methods: 'GET')]
    public function getSessionOne(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo
        ): Response{
            return $this->json($sessionRepo->find(1),200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            
    }
    #[Route('/session/top/{value}', name: 'app_session_top', methods: 'GET')]
    public function getSessionTop(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo, 
        $value,       
        TypeSessionRepository $typeRepo
        ): Response{
            //récupération de l'objet typeSession
            $type = $typeRepo->findOneBy(['name_type_session' => $value]);
            //récupération de la liste des sessions 10 derniéres session avec le type
            $tab = $sessionRepo->findByTop($type);
            //retour du json (liste des sessions)
            return $this->json($tab,200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
    }
    #[Route('/session/name/{value}', name: 'app_session_name', methods: 'GET')]
    public function getSessionByName(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo, 
        $value,
        ): Response{
            //récupération de la session par son nom
            $type = $sessionRepo->findOneBy(['name_session' => $value]);
            //retour du json (liste des sessions)
            return $this->json($type,200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
    }
    #[Route('/session/id/{id}', name: 'app_session_id', methods: 'GET')]
    public function getSessionById(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo,
        $id
        ): Response{
            return $this->json($sessionRepo->find($id),200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
    }
}
