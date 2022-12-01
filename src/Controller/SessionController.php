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
    #[Route('/session', name: 'app_accueil')]
    public function index(SessionRepository $session): Response
    {
        $sessions = $session->findAll();
        
        return $this->render('session/index.html.twig', 
        ['all' => $sessions]);
    }
    //retourne toutes les sessions (erreur ok)
    #[Route('/session/all', name: 'app_session_all', methods: 'GET')]
    public function getSession(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo
        ): Response{
            $value = $sessionRepo->findAll();
            //test si il n'y à pas de session json -> erreur 
            if(empty($value)){
                return $this->json(['error'=>'Il n\'y à pas de session'],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //Sinon retourne la première session -> json session
            else{
                return $this->json($value,200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            }
    }
    //retourne la première session (erreur ok)
    #[Route('/session/first', name: 'app_session_One', methods: 'GET')]
    public function getSessionOne(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo
        ): Response{
            $value = $sessionRepo->findFirst();
            //test si il n'y à pas de session json -> erreur 
            if(empty($value)){
                return $this->json(['error'=>'Il n\'y à pas de session'],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //Sinon retourne la première session -> json session
            else{
                return $this->json($value,200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            } 
    }
    //retourne la dernière session (erreur ok)
    #[Route('/session/last', name: 'app_session_last', methods: 'GET')]
    public function getSessionLast(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo
        ): Response{
            $value = $sessionRepo->findLast();
            //test si il n'y à pas de session json -> erreur 
            if(empty($value)){
                return $this->json(['error'=>'Il n\'y à pas de session'],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //Sinon retourne la dernière session -> json session
            else{
                return $this->json($value,200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            } 
    }
    //Retourne json du top 10 par filière (erreur ok)
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
            //test si la filière n'existe pas json -> erreur 
            if(empty($type)){
                return $this->json(['error'=>'La filiére '.$value.' n\'existe pas'],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //test si il n'y à pas de session dans la filière json -> erreur 
            else if(empty($tab)){
                return $this->json(['error'=>'>Il n\'y à pas de session dans la filière '.$value.''],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //sinon //retour du json (liste des sessions)
            else{
                return $this->json($tab,200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            } 
    }
    //affiche json session par son nom (erreur ok)
    #[Route('/session/name/{value}', name: 'app_session_name', methods: 'GET')]
    public function getSessionByName(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo, 
        $value,
        ): Response{
            //récupération de la session par son nom
            $name = $sessionRepo->findOneBy(['name_session' => $value]);
            //test si le nom existe pas json -> erreur
            if(empty($name)){
                return $this->json(['error'=>'La session : '.$value. ' n\'existe pas'],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //affiche la session par son nom json-> session par son nom
            else{
                //retour du json (session par son nom)
                return $this->json($name,200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            } 
    }
    //affiche json session par son id (erreur ok)
    #[Route('/session/id/{id}', name: 'app_session_id', methods: 'GET')]
    public function getSessionById(
        NormalizerInterface $normalizer,
        SessionRepository $sessionRepo,
        $id
        ): Response{
            //test si pas de session json -> erreur
            if(empty($sessionRepo->find($id))){
                return $this->json(['error'=>'La session '.$id.' n\'existe pas'],200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
            }
            //sinon affiche la session par son id
            else{
                return $this->json($sessionRepo->find($id),200, 
                ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'session']);
            }
    }
}
