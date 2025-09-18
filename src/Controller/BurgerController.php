<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/burger', name: 'burger_')]
class BurgerController extends AbstractController
{
    private $burgers = [
        0 => ['id' => 1, 'nom' => 'Big quattro', 'description' => 'tout ce que tu veux', 'prix' => 6.5],
        1 => ['id' => 2, 'nom' => 'Big cheese', 'description' => 'fromage', 'prix' => 7],
        2 => ['id' => 3, 'nom' => 'Big burger', 'description' => 'salade, tomate, ognon', 'prix' => 8.5],
    ];

    #[Route('/burgers', name: 'burgers')]
    public function list($burgers): Response
    {
        return $this->render('burger/liste_burgers.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/burger/{id}', name: 'detail', methods: ['GET', 'POST'])]
    public function show(int $id): Response{
        for($i = 0; $i < count($this->burgers); $i++){
            if($this->burgers[$i]['id'] == $id){
                $burger = $this->burgers[$i];
            }
        }
        return $this->render('burger/burger_show.html.twig', ['id' => $id, 'burger' => $burger]);
    }
}
