<?php

namespace App\Controller;

use App\Entity\Crypto;
use App\Services\TransactionService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
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
    public function getApi(TransactionService $trs, EntityManagerInterface $em)
    {
        $vars = $trs->injection_Crypto($em);

        return $vars;
    }
}
