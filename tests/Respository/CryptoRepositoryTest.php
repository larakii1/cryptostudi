<?php

namespace App\Tests\Repository;

use App\DataFixtures\CryptoFixtures;
use App\Entity\Crypto;
use App\Repository\CryptoRepository;
use Doctrine\ORM\EntityManager;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\AbstractDatabaseTool;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\MakerBundle\DependencyInjection\CompilerPass\SetDoctrineManagerRegistryClassPass;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CryptoRepositoryTest extends WebTestCase
{

    protected $databaseTool;

    public function setUp(): void
    {
        parent::setUp();

        $this->databaseTool = self::getContainer(DatabaseToolCollection::class)->get('default');
    }



    public function testpersist()
    {
        $client = $this->createClient();
    }
}
