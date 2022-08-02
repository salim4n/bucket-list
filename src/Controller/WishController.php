<?php

namespace App\Controller;

use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{


    /**
     * @Route("/wish", name="wish_list")
     */
    public function list(WishRepository $wishRepository): Response
    {
        $wish = $wishRepository->findAll();
        dump($wish);

        return $this->render('wish/list.html.twig', [
                "wish" => $wish
        ]);
    }

    /**
     * @Route("/wish/detail/{id} ", name="wish_detail")
     */
    public function detail(int $id, WishRepository $wishRepository){

        $wish = $wishRepository->find($id);
        dump($wish);

        if(!$wish) {
            throw $this-> createNotFoundException('This wish do not exists.');
        }

        return $this->render('wish/wish-detail.html.twig',[
            "wish"=> $wish
        ]);
    }
}
