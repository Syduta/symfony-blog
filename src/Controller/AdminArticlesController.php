<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminArticlesController extends AbstractController {

    /**
     * @Route("/admin/article/{id}",name="admin-article");
     */
    // on configure la méthode en l'instanciant avec articlerepository pour récupérer un article grâce à son id
    public function article(ArticleRepository $articleRepository, $id){
        $article = $articleRepository->find($id);
        return $this->render('admin/article.html.twig',['article'=>$article]);
    }

    /**
     * @Route("/admin/articles",name="admin-articles");
     */
    // on configure la méthode en l'instanciant avec articlerepository pour récupérer les articles de la table
    public function articles(ArticleRepository $articleRepository){
        $articles = $articleRepository->findAll();
        return $this->render('admin/articles.html.twig',['articles'=>$articles]);
    }

//    /**
//     * @Route("/articles",name="articles");
//     */
//
//    public function articles(){
//        $articles = [
//            1 => [
//                'title' => 'Non, là c\'est sale',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Eric',
//                'image' => 'https://media.gqmagazine.fr/photos/5b991bbe21de720011925e1b/master/w_780,h_511,c_limit/la_tour_montparnasse_infernale_1893.jpeg',
//                'id' => 1
//            ],
//            2 => [
//                'title' => 'Il faut trouver tous les gens qui étaient de dos hier',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Maurice',
//                'image' => 'https://fr.web.img6.acsta.net/r_1280_720/medias/nmedia/18/35/18/13/18369680.jpg',
//                'id' => 2
//            ],
//            3 => [
//                'title' => 'Pluuutôôôôt Braaaaaach, Vasarelyyyyyy',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Didier',
//                'image' => 'https://media.gqmagazine.fr/photos/5eb02109566df9b15ae026f3/master/pass/n-3freres.jpg',
//                'id' => 3
//            ],
//            4 => [
//                'title' => 'Quand on attaque l\'empire, l\'empire contre attaque',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Mbala',
//                'image' => 'https://fr.web.img2.acsta.net/newsv7/21/01/20/15/49/5077377.jpg',
//                'id' => 4
//            ],
//        ];
////        on renvoit le contenu du tableau grâce à this et l'héritage vers le fichier twig avec pour variable articles
//
//        return $this->render('articles.html.twig',['articles'=>$articles]);
//    }




//    /**
//     * @Route("/article/{id}",name="article");
//     */
//
//    public function article($id){
//        $articles = [
//            1 => [
//                'title' => 'Non, là c\'est sale',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Eric',
//                'image' => 'https://media.gqmagazine.fr/photos/5b991bbe21de720011925e1b/master/w_780,h_511,c_limit/la_tour_montparnasse_infernale_1893.jpeg',
//                'id' => 1
//            ],
//            2 => [
//                'title' => 'Il faut trouver tous les gens qui étaient de dos hier',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Maurice',
//                'image' => 'https://fr.web.img6.acsta.net/r_1280_720/medias/nmedia/18/35/18/13/18369680.jpg',
//                'id' => 2
//            ],
//            3 => [
//                'title' => 'Pluuutôôôôt Braaaaaach, Vasarelyyyyyy',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Didier',
//                'image' => 'https://media.gqmagazine.fr/photos/5eb02109566df9b15ae026f3/master/pass/n-3freres.jpg',
//                'id' => 3
//            ],
//            4 => [
//                'title' => 'Quand on attaque l\'empire, l\'empire contre attaque',
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet assumenda deserunt eius eveniet molestias necessitatibus non, quos sed sequi! Animi aspernatur assumenda earum laudantium odio quasi quibusdam quisquam veniam.',
//                'publishedAt' => new \DateTime('NOW'),
//                'isPublished' => true,
//                'author' => 'Mbala',
//                'image' => 'https://fr.web.img2.acsta.net/newsv7/21/01/20/15/49/5077377.jpg',
//                'id' => 4
//            ],
//        ];
////        on renvoit le contenu du tableau grâce à this et l'héritage vers le fichier twig avec pour variable articles
////        et ici c'est l'id qui permettra d'afficher l'article correspondant
//        return $this->render('article.html.twig',['articles'=>$articles[$id]]);
//
//    }

    /**
     * @Route("/admin/new-article",name="admin-new-article");
     */

    //on crée l'instance newArticle, entitymanager servira pour faire suivre le contenu dans la bdd
    public function newArticle(EntityManagerInterface $entityManager){

        //avec $article on crée un nouvel article grâce à l'instance new article
        $article = new Article();

        //on utilise les setters pour définir chaque champ
        $article->setTitle("mal au casque");
        $article->setContent("on a tous la tronche de travers avec cette partie");
        $article->setAuthor("le plus beau de tous les rebeus");
        $article->setIsPublished(true);
        $article->setImage("https://cd1.rap2france.com/public/medias/news/8668/660x330/mdpi/arouf-gangsta-dans-la-sauce-suite-a-des-accusations-de-pedophilie-1609593947.jpg");
        //on balance tous les champs dans la bdd
        $entityManager->persist($article);
        //
        $entityManager->flush();
        dump($article); die;
    }

    /**
     * @Route("/admin/articles/delete/{id}",name="admin-delete-article");
     */

    // on instancie la méthode pour récup l'id avec articlerepository et la gérer avec entitymanager
    public function deleteArticle($id, ArticleRepository $articleRepository, EntityManagerInterface $entityManager){
        //là on récupère l'id dans la variable article
        $article = $articleRepository->find($id);

        //si l'id existe on supprime et on push la différence dans la bdd
        if(!is_null($article)){
            $entityManager->remove($article);
            $entityManager->flush();
            //redirection vers home
            return $this->redirectToRoute('home');
        }else{
            //message d'erreur
            return ('erreur déjà supprimé');
        }
    }

    /**
     * @Route("/admin/articles/update/{id}",name="admin-update-article");
     */
    // on instancie la méthode pour récup l'id avec articlerepository et la gérer avec entitymanager
    public function updateArticle($id, ArticleRepository $articleRepository, EntityManagerInterface $entityManager){
        //là on récupère l'id dans la variable article
        $article = $articleRepository->find($id);
        //on change le titre
        $article->setTitle("lourd titre");
        //on push dans la bdd
        $entityManager->persist($article);
        $entityManager->flush();
        //retour à la page articles
        return $this->redirectToRoute('admin-articles');
    }
}