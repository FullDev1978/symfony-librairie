<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="app_categorie")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categories' => $categorieRepository->findBy([], ['nom' => 'ASC']),
        ]);
    }

    /**
     * @Route("/categorie/{slug}", name="app_categorie_show")
     */
    public function show(CategorieRepository $categorieRepository, string $slug): Response
   
    {
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorieRepository->findOneBy(["slug" => $slug]),
        ]);
    }

    /**
     * @Route("/categorie/{slug}/{id}", name="app_categorie_show_livre")
     */
    public function showLivre(LivreRepository $LivreRepository, string $slug, int $id): Response
   
    {
        return $this->render('categorie/show-livre.html.twig', [
            'livre' => $LivreRepository->find($id),
        ]);
    }
}
