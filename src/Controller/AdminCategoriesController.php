<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class AdminCategoriesController extends AbstractController
{

    /**
     * @Route("/admin/category/{id}",name="admin-category");
     */
    // on configure la méthode en l'instanciant avec categoryrepository pour récupérer une category grâce à son id
    public function dataCategory(CategoryRepository $categoryRepository,$id){
        $category = $categoryRepository->find($id);
        return $this->render('admin/category.html.twig',['category'=>$category]);
    }

    /**
     * @Route("/admin/categories",name="admin-categories");
     */
    // on configure la méthode en l'instanciant avec categoryrepository pour récupérer entièrement la table category
    public function dataCategories(CategoryRepository $categoryRepository){
        $categories = $categoryRepository->findAll();
        return $this->render('admin/categories.html.twig',['categories'=>$categories]);
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

    /**
     * @Route("/admin/categories/delete/{id}",name="admin-delete-category");
     */

    // on instancie la méthode pour récup l'id avec articlerepository et la gérer avec entitymanager
    public function deleteArticle($id, CategoryRepository $categoryRepository, EntityManagerInterface $entityManager){
        //là on récupère l'id dans la variable article
        $category = $categoryRepository->find($id);

        //si l'id existe on supprime et on push la différence dans la bdd
        if(!is_null($category)){
            $entityManager->remove($category);
            $entityManager->flush();
            //redirection vers home
            return $this->redirectToRoute('home');
        }else{
            //message d'erreur
            return ('erreur déjà supprimé');
        }
    }

    /**
     * @Route("/admin/categories/update/{id}",name="admin-update-category");
     */
    // on instancie la méthode pour récup l'id avec categoryrepository et la gérer avec entitymanager
    public function updateCategory($id, CategoryRepository $categoryRepository, EntityManagerInterface $entityManager){
        //là on récupère l'id dans la variable category
        $category = $categoryRepository->find($id);
        //on change le titre
        $category->setTitle("c'est cool quand ça marche");
        //on push dans la bdd
        $entityManager->persist($category);
        $entityManager->flush();
        //retour à la page articles
        return $this->redirectToRoute('admin-categories');
    }

}