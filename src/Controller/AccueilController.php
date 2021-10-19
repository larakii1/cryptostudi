<?php

namespace App\Controller;

use App\Repository\PriceVariationRepository;
use App\Services\AccueilService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AccueilController extends AbstractController
{
    public function __construct()
    {
    }
    #[Route('/', name: 'accueil')]
    public function index(AccueilService $accueilService, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator, PriceVariationRepository $prv)
    {

        $price = $accueilService->totalPrice();
        $transaction_wallet =  $accueilService->transactionWallet();
        foreach ($transaction_wallet as $transaction) {
            $transaction->setVariation($prv->queryLastVariation($transaction->getId()));
        }
        // $variation = $accueilService->variation($em);
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'transac' => $transaction_wallet,
            'price' => $price,

        ]);
    }
}
