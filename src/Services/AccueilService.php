<?php

namespace App\Services;

use App\Repository\Crypto;
use App\Repository\CryptoRepository;

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
}
