<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Crypto;

class CryptoTest extends KernelTestCase
{

    public function createCryptoTest()
    {
        $crypto = (new Crypto())

            ->setName("demo")
            ->setPrice(200)
            ->setQuantity(2);
        self::bootKernel();

        $this->assertCount(0);
    }
}
