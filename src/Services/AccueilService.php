<?php

namespace App\Services;

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

    public function totalPrice()
    {


        $cryptoRepository = $this->cryptoRepository;
        $price = $cryptoRepository->getTotalPrice()[0];


        return $price;
    }
}
