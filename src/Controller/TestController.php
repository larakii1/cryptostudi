<?php

namespace App\Controller;

use App\Services\AccueilService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/testb', name: 'test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }


    #[Route('/test', name: 'haha')]
    public function getApi(AccueilService $a)
    {

        dd($a->totalPrice());
    }
}
