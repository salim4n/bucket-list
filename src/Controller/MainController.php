<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController  extends AbstractController
{

    /**
     * @Route("/home", name="main_home")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/",name="main_bucket")
     */
    public function bucketHome(): Response {

        return $this->render('main/homeBucket.html.twig');
    }

    /**
     * @Route("/aboutUs", name="main_aboutUs")
     */
    public function aboutUs(){

        $rawData = file_get_contents("../data/team.json");

        $teams = json_decode($rawData,true);

        return $this->render('main/aboutUs.html.twig',[
            'teams' => $teams
        ]);
    }


}