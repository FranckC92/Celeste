<?php

namespace App\Controller;

use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(ManagerRegistry $managerRegistry): Response
    {
        //page d'acceuil
        $entityManager = $managerRegistry->getManager();
        $productRepository = $entityManager->getRepository(Product::class);
        $productRepository = $entityManager->getRepository(Product::class);
        //On récupère nos Catégories que nous allons transférer
        $categoryRepository = $entityManager->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        //On récupère tous les éléments Product
        $products = $productRepository->findAll();
        //On crée une "selectedCatgory" sous la forme d'un tableau associatif
        $selectedCategory = [
            'name' => 'Celeste',
            'description' => 'Bienvenue sur la page d\'accueil de votre applaication mobile educatif & scolaire.Cesleste est un livret scolaire numérique qui vous permets d avoir toutes les activites scolaires et sportives',];

        return $this->render('index/index.html.twig', [
            'categories' => $categories, //On envoie notre tableau de Categories vers Twig
            'selectedCategory' => $selectedCategory,
            'products' => $products,
        ]);
    }
}
