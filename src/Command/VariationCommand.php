<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Entity\PriceVariation;
use App\Entity\Crypto;
use Doctrine\ORM\EntityManagerInteface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'app:variation',
    description: 'Add a short description for your command',
)]
class VariationCommand extends Command
{
    private $em;
    private $client;
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }
    protected static $defaultName = "app:varatiation";
    public function __construct(EntityManagerInterface $em, HttpClientInterface $client)
    {
        $this->em = $em;
        $this->client =   $client->request(
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
        parent::__construct();
    }





    protected function execute(InputInterface $input, OutputInterface $outputn)
    {

        $em = $this->em;
        $params = $this->client->toArray()["data"];
        foreach ($params as $cryptoApi) {
            $crypto = $em->getRepository(Crypto::class)->findOneBy([
                "name" => $cryptoApi["symbol"] . " "  . $cryptoApi["name"]
            ]);
            $crypto->setPrice($cryptoApi['quote']['EUR']['price']);

            $em->flush();

            $variation = new PriceVariation;
            $variation->setCrypto($crypto);
            $variation->setPrice($cryptoApi['quote']['EUR']['price']);
            $variation->setDate(new \DateTime());
            $em->persist($variation);
            $em->flush();
            return Command::SUCCESS;
        }
    }
}
