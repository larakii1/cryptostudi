<?php

namespace App\Services;

use App\Repository\TransactionRepository;

class AccueilService
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function transactionWallet()
    {
        $transactionpository = $this->transactionRepository;
        return $transactionpository->findAll();
    }
}
