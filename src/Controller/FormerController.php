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
    //retourne la liste des formateurs (erreur ok)
    #[Route('/former/all', name: 'app_former_all', methods:'GET')]
    public function index(
        FormerRepository $formerRepository,
        NormalizerInterface $normalizer): Response{
        $data = $formerRepository->findAll();
        //test si la liste des formateurs est vide json -> erreur 
        if(empty($data)){
            return $this->json(['error'=>'Il n\'y à pas de formateur'],200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
        }
        //Sinon retourne la liste des formateurs -> json formateurs
        else{
            return $this->json($data,200, ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'],
            ['groups' => 'tt']);
        }
    }
    //retourne le formateur par son id -> json formateur (erreur ok)
    #[Route('/former/id/{id}', name: 'app_former_id', methods: 'GET')]
    public function getFormerById(
        FormerRepository $formerRepository,
        $id
        ): Response{
        $data = $formerRepository->find($id);
        //test si le formateur n'existe pas -> json erreur
        if(empty($data)){
            return $this->json(["error"=>"Le formateur ".$id." existe pas"],200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*']);
        }
        //sinon retourne le formateur -> json formateur
        else{
            return $this->json($formerRepository->find($id),200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'tt']);
        }
    }
}