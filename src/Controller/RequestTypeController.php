<?php

namespace App\Controller;
use App\Entity\RequestType;
use App\Repository\RequestTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;
use Doctrine\ORM\EntityManagerInterface;

class RequestTypeController extends AbstractController
{
    #[Route('/request/type', name: 'app_request_type')]
    public function index(RequestTypeRepository $rcRepository,
    NormalizerInterface $normalizer): Response 
    {
        return $this->json($rcRepository->findAll(),200, [], ['groups'=>'show_type']);
    }
    //méthode formulaire de contact
    #[Route('/request/type/contact', name: 'app_request_type_contact', methods:'POST')]
    public function addContactTYpe(
        Request $request,
        SerializerInterface $serializer,
        EntityManagerInterface $em,
        RequestTypeRepository $requestType
        ): Response {
            //récupération du json
            $type_recup = $request->getContent();
            //décodage du json recu
            $data = $serializer->decode($type_recup, 'json');
            //création d'un nouveau contact
            $type = new RequestType();
            $type->setNameRequestType($data['name_request_type']);
            
            //on fait persister les données
            $em->persist($type);
            //envoi en BDD
            $em->flush();
            //dump and die de $cat
            dd($type);
    } 
}
