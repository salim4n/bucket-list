<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class FormWishController extends AbstractController
{

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {

        $wish = new Wish();
        $wishForm = $this->createForm(WishType::class, $wish);

        $wishForm -> handleRequest($request);

        if($wishForm->isSubmitted()){
            $entityManager->persist($wish);
            $entityManager->flush();

            $this->addFlash('success','souhait ajouter gg mec');
            return $this->redirectToRoute('wish_detail',['id'=>$wish->getId()]);
        }

        return $this->render('wish/create.html.twig', [
            'wishForm'=> $wishForm -> createView(),
            'wish'=>$wish
        ]);

    }



}