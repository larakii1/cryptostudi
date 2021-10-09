<?php

namespace App\Controller;


use App\Services\AccueilService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    public function __construct()
    {
    }
    #[Route('/', name: 'accueil')]
    public function index(AccueilService $accueilService)
    {
        $price = $accueilService->totalPrice();
        $transaction_wallet =  $accueilService->transactionWallet();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'transac' => $transaction_wallet,
            'price' => $price

        ]);
    }
}
