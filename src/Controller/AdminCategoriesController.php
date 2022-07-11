<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/admin/new-category",name="admin-new-category");
     */
        //on associe request à l'entitymanager pour récupérer les données du formulaire
    public function newCategory(EntityManagerInterface $entityManager, Request $request)
    {

        //on défini des variables avec les valeurs de chaque champ
        $title = $request->query->get('title');
        $color = $request->query->get('color');
        $description = $request->query->get('description');
        //si aucun des champs n'est vide on crée une nouvelle catégorie
        if(!empty($title) && !empty($description) && !empty($color)){
            $category = new Category();
            //$newstr = filter_var($str, FILTER_SANITIZE_STRING);
            //qui aura pour champs nos données du formulaire que l'on défini avec set
            $category->setTitle(filter_var($title,FILTER_SANITIZE_STRING));
            $category->setColor($color);
            $category->setDescription(filter_var($description,FILTER_SANITIZE_STRING));
            $category->setIsPublished(true);
            //on envoit dans la bdd
            $entityManager->persist($category);
            $entityManager->flush();
            //message confirmant la création d'une catégorie
            $this->addFlash('success', 'Vous avez bien ajouté la catégorie !');
            return $this->redirectToRoute("admin-categories");

        }
        //message d'erreurs pour ceux qui lisent pas les conditions :p
        $this->addFlash('error', 'Merci de remplir le titre, la couleur et le contenu !');
        return $this->render('/admin/new-category.html.twig');

        //on utilise les setters pour définir chaque champ

        //on balance tous les champs dans la bdd
//        $entityManager->persist($category);
        //
//        $entityManager->flush();
//        $this->addFlash('success','catégorie créé');
//        return $this->redirectToRoute('admin-categories');
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
            $this->addFlash('success','catégorie supprimée avec succès');
            return $this->redirectToRoute('admin-categories');
        }else{
            //message d'erreur
            $this->addFlash('success','catégorie déjà supprimée');
            return $this->redirectToRoute('admin-categories');

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
        $this->addFlash('success','catégorie mise à jour');
        return $this->redirectToRoute('admin-categories');
    }

}