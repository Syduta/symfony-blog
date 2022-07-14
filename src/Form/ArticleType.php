<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('image')
            ->add('isPublished')
            ->add('author')
            ->add('content')
            // on ajoute le champs category afin de gérer la sélection d'une catégorie pour l'article
            // entitytype sert à gérer la relation vers une entité
            //et je parametre mon input pour qu'il affiche toutes les catégories
            // de la bdd avec leur titre dans les options du select
            ->add('category',EntityType::class, [
                    'class'=>Category::class,
                    'choice_label'=>'title',
                    'placeholder'=>'Choisissez une catégorie',
                ])
            ->add('submit',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
