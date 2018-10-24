<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller
{

    /**
     * Montre la page qui dit Bonjour
     * @Route("/hello/{prenom}",name="hello")
     * 
     */

    public function hello($prenom = "anonyme")
    {
        return new Response("Bonjour $prenom ");
    }

    /**
     * @Route("/",name="homepage")
     */

    public function home()
    {
       return $this->render('home.html.twig',[
            "title"=>"Bonjours a tous",
            "paragraph"=>"Comment allez vous !?"
       ]);   
    }


}
