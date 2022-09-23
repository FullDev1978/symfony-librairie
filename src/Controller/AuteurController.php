<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    /**
     * @Route("/auteur", name="app_auteur")
     */
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/auteur/search", name="app_auteur_search")
    */
    public function search(AuteurRepository $auteurRepository, Request $request): Response
    {
        return $this->render('auteur/index.html.twig', [

            'auteurs' => $auteurRepository->search($request->request->get('search-value') ),
        ]);
    }
    /**
     * @Route("/auteur/{id}", name="app_auteur_show")
     */
    public function show(AuteurRepository $auteurRepository,int $id): Response
    {
        return $this->render('auteur/show.html.twig', [
            'auteur' => $auteurRepository->find($id),
        ]);
    }
}
