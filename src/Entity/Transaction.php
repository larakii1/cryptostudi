<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Crypto::class,inversedBy="transactions", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $crypto;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrypto(): ?Crypto
    {
        return $this->crypto;
    }

    public function setCrypto(?Crypto $crypto): ?self
    {
        $this->crypto = $crypto;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }


    public function __toString()
    {
        return $this->getCrypto();
    }
}
