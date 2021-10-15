<?php

namespace App\Tests\Contoller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TransactionControllerTest extends WebTestCase
{

    public function testTransactionController()
    {
        $client = static::createClient();
        $client->request('GET', '/transaction');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        dump($client->getResponse()->getContent());
    }
}
