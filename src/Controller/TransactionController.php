<?php

namespace App\Controller;

use App\Repository\CryptoRepository;
use App\Services\TransactionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
}
