<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PokerController extends AbstractController
{
    /**
     * @Route("/poker",name="poker");
     */

    public function poker(){

        return $this->render('poker.html.twig');
    }
}