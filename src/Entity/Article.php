<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
//on utilise doctrine pour créer/trouver/migrer bdd
/**
 * @ORM\Entity()
 */
//ici symfony capte grâce à orm qu' entity n'est pas une route mais un outil pour la transformation en bdd
//on crée un entitée class article grâce à orm
class Article
//article sera une table
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    public $id;
    //id sera un champ de la table

    /**
     * @ORM\Column(type="string")
     */
    public $title;
    //title aussi
}