<?php

namespace App\Services;

use App\Entity\Crypto;
use App\Entity\PriceVariation;
use App\Repository\CryptoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AccueilService
{
    private $cryptoRepository;
    private $client;
    private $em;
    public function __construct(CryptoRepository $cryptoRepository, HttpClientInterface $client, EntityManagerInterface $em)
    {
        $this->cryptoRepository = $cryptoRepository;
        $this->em = $em;
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


    function variation(EntityManagerInterface $em)
    {
    }



    public function transactionWallet()
    {
        $cryptoRepository = $this->cryptoRepository;
        return $cryptoRepository->findAll();
    }

    public function totalPrice()
    {

        $em = $this->em;

        $cryptoRepository = $this->cryptoRepository;
        $price = $cryptoRepository->getTotalPrice()[0];


        return $price;
    }
}
