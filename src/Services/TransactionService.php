<?php

namespace App\Services;

use App\Entity\Crypto;
use App\Entity\Transaction;
use App\Form\TransactionType;
use App\Repository\CryptoRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManagerInterface;

use phpDocumentor\Reflection\Types\Float_;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TransactionService
{
    private $client;
    public function __construct(HttpClientInterface $client)
    {
        $this->client =
            $client->request(
                "GET",
                "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest",
                [
                    'headers' => [
                        'X-CMC_PRO_API_KEY' => '81c75551-bf0b-4863-824c-0c1e611f4d8d',

                    ],

                    'query' => [
                        'limit' => 10,
                        'convert' => 'EUR',

                    ]


                ]
            );
    }

    /* persistence pour la table crypto en fonction des données de l'API*/
    public function injection_Crypto(EntityManagerInterface $em)
    {
    }
    public function injection_Transaction(FormFactoryInterface $factory, EntityManagerInterface $em, Request $request, ValidatorInterface $validator, CryptoRepository $cr)
    {




        $params = $this->client->toArray()["data"];
        foreach ($params as $cryptoApi) {
            $crypto = $em->getRepository(Crypto::class)->findOneBy([
                "name" => $cryptoApi["symbol"] . " "  . $cryptoApi["name"]
            ]);
            $crypto->setPrice($cryptoApi['quote']['EUR']['price']);

            $em->flush();
        }




        $builder = $factory->createBuilder(TransactionType::class);
        $form = $builder->getForm();
        $formView = $form->createView();
        $form->handleRequest($request);
        $transaction = $form->getData();




        if ($form->isSubmitted()) {

            $crypto = $form->get('crypto')->getData();
            $crypto->setQuantity($crypto->getQuantity() + $form->get('quantity')->getData());
            $em->persist($transaction);
            $em->persist($crypto);
            $em->flush();
        }





        return $formView;
    }
}
