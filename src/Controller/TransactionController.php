<?php

namespace App\Controller;

use App\Repository\CryptoRepository;
use App\Services\TransactionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Crypto;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TransactionController extends AbstractController
{
    #[Route('/transaction', name: 'transaction')]
    public function transcation_Achat(TransactionService $transactionService, Request $request, EntityManagerInterface $em, FormFactoryInterface $factory, ValidatorInterface $validator, CryptoRepository $cr)


    {
        return $this->render('transaction/index.html.twig', [
            "formView" => $transactionService->injection_Transaction($factory, $em, $request, $validator, $cr)
        ]);
    }




    #[Route('/vente', name: 'vente')]
    public function transaction_Vente(TransactionService $transactionService, Request $request, EntityManagerInterface $em, FormFactoryInterface $factory, ValidatorInterface $validator, CryptoRepository $cr)
    {
        return $this->render('transaction/vente.html.twig', [
            'formView' => $transactionService->delete_Transaction($factory, $em, $request, $validator, $cr)

        ]);
    }


    #[Route('/convert', name: 'convert')]
    public function convertQuantiyPrice(Request $request, EntityManagerInterface $em): Response

    {
        $crypto_id = $request->get("id");
        $quanity = $request->get("quantity");
        $crypto = $em->getRepository(Crypto::class)->findOneBy(
            [
                "id" => $crypto_id,

            ]
        );

        $montant = round($crypto->getPrice(), 2)  * (int)$quanity . " €";
        return new Response($montant);
    }


    #[Route('/price', name: 'price')]
    public function convertPriceQuantity(Request $request, EntityManagerInterface $em): Response

    {
        $crypto_id = $request->get("id");
        $price = $request->get("price");
        $crypto = $em->getRepository(Crypto::class)->findOneBy(
            [
                "id" => $crypto_id,

            ]
        );

        $quantite =  (int)$price / $crypto->getPrice();
        return new Response($quantite);
    }
}
