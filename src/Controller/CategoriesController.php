<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class CategoriesController extends AbstractController
{
    /**
     * @Route("new-category",name="new-category");
     */

    public function newCategory(EntityManagerInterface $entityManager)
    {

        //avec $category on crée une nouvelle catégorie grâce à l'instance new Category
        $category = new Category();

        //on utilise les setters pour définir chaque champ
        $category->setTitle("copié-collé");
        $category->setColor("chartreuse");
        $category->setDescription("avec le raccourci clavier svp");
        $category->setIsPublished(true);

        //on balance tous les champs dans la bdd
        $entityManager->persist($category);
        //
        $entityManager->flush();
        dump($category);
        die;
    }
}