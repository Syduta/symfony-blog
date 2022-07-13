<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminArticlesController extends AbstractController {

    /**
     * @Route("/admin/article/{id}",name="admin-article")
     */
    // on configure la méthode en l'instanciant avec articlerepository pour récupérer un article grâce à son id
    public function article(ArticleRepository $articleRepository, $id){
        $article = $articleRepository->find($id);
        return $this->render('admin/article.html.twig',['article'=>$article]);
    }

    /**
     * @Route("/admin/articles",name="admin-articles")
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
     * @Route("/admin/new-article",name="admin-new-article")
     */



//    //on crée l'instance newArticle, entitymanager servira pour faire suivre le contenu dans la bdd
    public function newArticle(EntityManagerInterface $entityManager, Request $request){
        //avec $article on crée un nouvel article grâce à l'instance new article
        $article = new Article();
        //avec $form on pourra créer un formulaire dont les champs répondront à la table article
        $form = $this->createForm(ArticleType::class, $article);
        // on utilise une instance de la classe request pour que les données des inputs soient set sur $article directement
        $form->handleRequest($request);
        // si le formulaire soumis est valide on l'enregistre dans la bdd
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($article);

            $entityManager->flush();
            $this->addFlash('success','article créé');


            }
        // on retourne sur le fichier twig associé le formulaire 'form'
        return $this->render("/admin/new-article.html.twig",['form'=>$form->createView()]);
    }
//
//        //avec $article on crée un nouvel article grâce à l'instance new article
//        $article = new Article();
//
//        //on utilise les setters pour définir chaque champ
//        $article->setTitle("c'est vendredi");
//        $article->setContent("on a tous la tronche de travers mais on a rien bu");
//        $article->setAuthor("on s'en branle");
//        $article->setIsPublished(true);
//        $article->setImage("https://preview.redd.it/i524xazja9a91.jpg?width=640&crop=smart&auto=webp&s=95e22eef3f44eccdaef081d7dd77130c4adc8030");
//        //on balance tous les champs dans la bdd
//        $entityManager->persist($article);
//        //
//        $entityManager->flush();
//        $this->addFlash('success','article créé');
//
//        return $this->render('admin/new-article.html.twig');
////        return $this->redirectToRoute('admin-articles');
    //}

    /**
     * @Route("/admin/articles/delete/{id}",name="admin-delete-article")
     */

    // on instancie la méthode pour récup l'id avec articlerepository et la gérer avec entitymanager
    public function deleteArticle($id, ArticleRepository $articleRepository, EntityManagerInterface $entityManager){
        //là on récupère l'id dans la variable article
        $article = $articleRepository->find($id);

        //si l'id existe on supprime et on push la différence dans la bdd
        if(!is_null($article)){
            $entityManager->remove($article);
            $entityManager->flush();
            $this->addFlash('success','article supprimé avec succès');
            //redirection vers home
            return $this->redirectToRoute('admin-articles');
        }else{
            //message d'erreur
            $this->addFlash('success','article déjà supprimé');
            return $this->redirectToRoute('admin-articles');
        }
    }

    /**
     * @Route("/admin/articles/update/{id}",name="admin-update-article")
     */
    // on instancie la méthode pour récup l'id avec articlerepository et la gérer avec entitymanager
    public function updateArticle($id, ArticleRepository $articleRepository, EntityManagerInterface $entityManager, Request $request)
    {
        //là on récupère l'id dans la variable article
        $article = $articleRepository->find($id);
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();
            $this->addFlash('success', 'article modifié');
        }
        return $this->render("admin/update-article.html.twig", ['form' => $form->createView()]);
    }

    /**
     * @Route("/admin/articles/search", name="admin-articles-search")
     */

    public function searchArticles(Request $request, ArticleRepository $articleRepository){
        // je récupère les valeurs du formulaire dans ma route
        $search = $request->query->get('search');

        // je vais créer une méthode dans l'ArticleRepository
        // qui trouve un article en fonction d'un mot dans son titre ou son contenu
        $articles = $articleRepository->searchByWord($search);

        if(!empty($articles)){

        // je renvoie un fichier twig en lui passant les articles trouvé
        // et je les affiche

        return $this->render('admin/articles-search.html.twig', ['articles' => $articles]);
        }else{
            //sinon message d'erreur on redirige vers home
            $this->addFlash('error', 'Votre recherche n\'a rien donné');
            return $this->redirectToRoute('home');
        }

    }

        //on change le titre
//        $article->setTitle("lourd titre");
//        //on push dans la bdd
//        $entityManager->persist($article);
//        $entityManager->flush();
//        //retour à la page articles
//        $this->addFlash('success','article mis à jour');
//        return $this->redirectToRoute('admin-articles');

}