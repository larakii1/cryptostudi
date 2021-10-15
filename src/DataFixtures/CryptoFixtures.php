<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\Crypto;

class CryptoFixtures extends Fixture
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
                        'convert' => 'EUR'
                    ]


                ]
            );
    }



    public function load(ObjectManager $manager)
    {
        $params = $this->client->toArray()["data"];
        foreach ($params as $cryptoApi) {

            $crypto = new Crypto();
            $crypto->setName($cryptoApi["symbol"] . " " . $cryptoApi["name"]);
            $crypto->setPrice($cryptoApi["quote"]["EUR"]["price"]);
            $crypto->setQuantity(0);
            $manager->persist($crypto);
            $manager->flush();
        }
    }
}
