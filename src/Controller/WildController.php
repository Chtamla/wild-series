<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild/{page<\d+>?1}", name="wild_index")
     * @return Response
     */
     public function index ():Response
     {
         return $this->render('wild/index.html.twig', [
             'website' => 'Wild Séries',
         ]);
     }


    /**
     * @Route("wild/show/{slug<[a-z0-9-]+>}", defaults={"slug":"Aucune série sélectionnée, veuillez choisir une série"}, name="wild_show")
     *
     */
     public function show($slug): Response
     {
         $slug=str_replace('-', ' ',$slug);
         //uniquement minuscule, chiffre ou tirets
         return $this->render('wild/show.html.twig', ["slug" => ucwords($slug)]);
     }


}