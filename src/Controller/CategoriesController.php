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
     * @Route("/category/{id}",name="category");
     */
    // on configure la méthode en l'instanciant avec categoryrepository pour récupérer une category grâce à son id
    public function dataCategory(CategoryRepository $categoryRepository,$id){
        $category = $categoryRepository->find($id);
        return $this->render('category.html.twig',['category'=>$category]);
    }

    /**
     * @Route("/categories",name="categories");
     */
    // on configure la méthode en l'instanciant avec categoryrepository pour récupérer entièrement la table category
    public function dataCategories(CategoryRepository $categoryRepository){
        $categories = $categoryRepository->findAll();
        return $this->render('categories.html.twig',['categories'=>$categories]);
    }

    /**
     * @Route("new-category",name="new-category");
     */

    public function newCategory(EntityManagerInterface $entityManager)
    {

        //avec $category on crée une nouvelle catégorie grâce à l'instance new Category
        $category = new Category();

        //on utilise les setters pour définir chaque champ
        $category->setTitle("tinder");
        $category->setColor("red");
        $category->setDescription("zééé parti");
        $category->setIsPublished(true);

        //on balance tous les champs dans la bdd
        $entityManager->persist($category);
        //
        $entityManager->flush();
        dump($category);
        die;
    }
}