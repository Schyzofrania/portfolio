<?php

namespace App\Controller;

use App\Entity\Projets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="login")
     */
    public function index(): Response
    {
        $projets = $this->getDoctrine()
        ->getRepository(Projets::class)
        ->findAll();
        return $this->render('login/index.html.twig', [
            'projets' => $projets,
        ]);
    }
}
