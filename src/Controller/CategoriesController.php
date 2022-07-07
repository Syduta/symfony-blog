<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class CategoriesController extends AbstractController
{

    /**
     * @Route("/data-category",name="data-category");
     */
    // on configure la méthode en l'instanciant avec categoryrepository pour récupérer une category grâce à son id
    public function dataCategory(CategoryRepository $categoryRepository){
        $category = $categoryRepository->find(1);
        dd($category);
    }

    /**
     * @Route("/data-categories",name="data-categories");
     */
    // on configure la méthode en l'instanciant avec categoryrepository pour récupérer entièrement la table category
    public function dataCategories(CategoryRepository $categoryRepository){
        $categories = $categoryRepository->findAll();
        dd($categories);
    }

    /**
     * @Route("new-category",name="new-category");
     */

    public function newCategory(EntityManagerInterface $entityManager)
    {

        //avec $category on crée une nouvelle catégorie grâce à l'instance new Category
        $category = new Article();
//        ou new Category();
        //on utilise les setters pour définir chaque champ
        $category->setTitle("ça vient");
        $category->setImage("https://i.redd.it/dv3nbmpi11a91.png");
        $category->setContent('c\'est pour l\'honneur');
        $category->setIsPublished(true);
        $category->setAuthor("zuki");
        $category->setKikoulol("lol");

        //on balance tous les champs dans la bdd
        $entityManager->persist($category);
        //
        $entityManager->flush();
        dump($category);
        die;
    }
}