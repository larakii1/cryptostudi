<?php

namespace App\Services;

use App\Entity\Crypto as EntityCrypto;
use App\Repository\Crypto;
use App\Repository\CryptoRepository;
use Proxies\__CG__\App\Entity\Crypto as AppEntityCrypto;

class AccueilService
{
    private $cryptoRepository;

    public function __construct(CryptoRepository $cryptoRepository)
    {
        $this->cryptoRepository = $cryptoRepository;
    }

    public function transactionWallet()
    {
        $cryptoRepository = $this->cryptoRepository;
        return $cryptoRepository->findAll();
    }

    public function totalPrice()
    {
        $crypto = new EntityCrypto;
        $cryptoRepository = $this->cryptoRepository;
        $price = $cryptoRepository->findOneBy([
            "price" => 7
        ]);
        dd($price);
    }
}
