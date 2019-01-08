<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\AdRepository;
use App\Repository\UserRepository;


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

    public function home(AdRepository $adRepo, UserRepository $userRepo)
    {
        return $this->render('home.html.twig', [
            'ads' => $adRepo->findBestAds(3),
            'user' => $userRepo->findBestUsers()
        ]);
    }


}
