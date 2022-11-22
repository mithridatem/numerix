<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeSessionController extends AbstractController
{
    #[Route('/type/session', name: 'app_type_session')]
    public function index(): Response
    {
        return $this->render('type_session/index.html.twig', [
            'controller_name' => 'TypeSessionController',
        ]);
    }
}
