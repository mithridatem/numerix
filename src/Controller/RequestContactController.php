<?php

namespace App\Controller;
use App\Entity\RequestContact;
use App\Repository\RequestContactRepository;
use App\Repository\RequestTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Doctrine\ORM\EntityManagerInterface;
class RequestContactController extends AbstractController
{   
    //méthode formulaire de contact
    #[Route('/request/contact', name: 'app_request_contact', methods:'POST')]
    public function addContact(
        Request $request,
        SerializerInterface $serializer,
        EntityManagerInterface $em,
        RequestContactRepository $requestContact,
        RequestTypeRepository $requestType
        ): Response {
            //récupération du json
            $contact_recup = $request->getContent();
            //décodage du json recu
            $data = $serializer->decode($contact_recup, 'json');
            //création d'un nouveau contact
            $contact = new RequestContact();
            $contact->setSubjectRequestContact($data['subject_request_contact']);
            $contact->setContentRequestContact($data['content_request_contact']);
            $contact->setPhoneRequestContact($data['phone_request_contact']);
            $contact->setMailRequestContact($data['mail_request_contact']);
            $contact->setCompanyNameRequestContact($data['company_name_request_contact']);
            $contact->setIdRequestType($requestType->find($data['id_request_type']));
            //on fait persister les données
            $em->persist($contact);
            //envoi en BDD
            $em->flush();
            //dump and die de $cat
            dd($contact);
    }
    //récupération de toutes les demandes de contact
    #[Route('/request/all', name: 'app_request_all', methods: 'GET')]
    public function getSession(
        NormalizerInterface $normalizer,
        RequestContactRepository $requestContact
        ): Response{
            //dd($contactRepo->findAll());
            return $this->json($requestContact->findAll(),200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'request']);
    }
    //récupération d'une demande de contact par son id
    #[Route('/request/id/{id}', name: 'app_request_id', methods: 'GET')]
    public function getSessionById(
        NormalizerInterface $normalizer,
        RequestContactRepository $requestContact,
        $id
        ): Response{
            return $this->json($requestContact->find($id),200, 
            ['Content-Type'=>'application/json','Access-Control-Allow-Origin'=> '*'], ['groups' => 'request']);
    }
}
