<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_index")
     */
    public function index(ProductRepository $productRepository)
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll()
        ]);
    }
    
    /**
     * @Route("/productpage/{id}", name="product_page")
     */

    public function product($id, ProductRepository $productRepository)
    {

        $produit = [];

        $produit[] = [
            'produit' => $productRepository->find($id)
        ];



        return $this->render('product/productpage.html.twig', [
            'produits' => $produit
        ]);
    }
}
