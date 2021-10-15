<?php

namespace App\Tests\Contoller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Panther\PantherTestCase;

class TransactionTest extends PantherTestCase
{


    public function testTransaction()
    {
        $client = static::createPantherClient();
        $crawler = $client->request("GET", "/transaction");
        $form = $crawler->selectButton("Ajouter")->form([
            "transaction[crypto]" => "XRP XRP",
            "transaction[quantity]" => 2,
        ]);
        $client->submit($form);
        $this->assertSelectorTextContains("div.alert.alert-success", "La transaction a été créé avec succès !");
    }
}
