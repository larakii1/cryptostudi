<?php

namespace App\Controller;

use App\Services\TransactionService;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\Persistence\ObjectManager as PersistenceObjectManager;

class GetTestController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('get_test/index.html.twig', [
            'controller_name' => 'GetTestController',
        ]);
    }

    #[Route('/get/test', name: 'get_test')]
    public function getApi(TransactionService $trs): Response
    {
        $vars = $trs->injection_Transaction();

        return new Response(dump($vars));
    }
}
