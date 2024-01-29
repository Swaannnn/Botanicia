<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur de la page d'accueil
 */

class HomeController extends AbstractController
{
    /**
     * Méthode qui affiche la page d'accueil
     *
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page d'accueil
     */
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $productRepository = $entityManager->getRepository(Product::class);
        $besttools = $productRepository->findBy(['category' => 'Outil & Equipement'],['price'=>'DESC'],2);
        $bestplants = $productRepository->findBy(['category' => 'Plante'],['price'=>'DESC'],4);
        $besttrees = $productRepository->findBy(['category' => 'Arbre'],['price'=>'DESC'],3 );
        $bestmachines = $productRepository->findBy(['category' => 'Machine'],['price'=>'DESC'],1);
        $products = array_merge($bestplants, $besttrees, $besttools,$bestmachines);
        $plants = $productRepository->findBy(['category' => 'Plante']);
        $trees = $productRepository->findBy(['category' => 'Arbre']);
        return $this->render('home/index.html.twig', [
            'products' => array_slice($products,0,15),
            'plants' => array_slice($plants,0,5),
            'trees' => array_slice($trees,0,5),
        ]);
    }
}
