<?php

namespace App\Services;

use App\Repository\TransactionCryptoRepository;

class AccueilService
{
    private $transactionCryptoRepository;

    public function __construct(TransactionCryptoRepository $transactionCryptoRepository)
    {
        $this->transactionCryptoRepository = $transactionCryptoRepository;
    }

    public function transactionWallet()
    {
        $transactionCryptoRepository = $this->transactionCryptoRepository;
        return $transactionCryptoRepository->findAll();
    }
}
