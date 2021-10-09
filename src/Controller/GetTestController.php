<?php

namespace App\Controller;

use App\Entity\Crypto;
use App\Services\AccueilService;
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
    #[Route('/blabla', name: 'get_testa')]
    public function index(AccueilService $accueilService)
    {
        $transaction_wallet =  $accueilService->transactionWallet();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'transac' => $transaction_wallet

        ]);
    }

    #[Route('/testc', name: 'get_test')]
    public function getApi(TransactionService $trs, EntityManagerInterface $em)
    {
        $vars = $trs->getTotalPrice($em);

        return $vars;
    }
}
