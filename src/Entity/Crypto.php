<?php

namespace App\Entity;

use App\Repository\CryptoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CryptoRepository::class)
 */
class Crypto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="crypto")
     */
    private $transactions;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    /**
     * @ORM\OneToMany(targetEntity=PriceVariation::class, mappedBy="crypto")
     */
    private $priceVariations;

    private $variation;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
        $this->priceVariations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getVariation(): ?float
    {
        return $this->variation;
    }

    public function setVariation(float $variation): self
    {
        $this->variation = $variation;

        return $this;
    }

    public function getTransaction(): Collection
    {
        return $this->transactions;
    }



    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setCrypto($this);
        }

        return $this;
    }




    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getCrypto() === $this) {
                $transaction->setCrypto(null);
            }
        }

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
        return $this->name . ' ' . $this->quantity . ' ' . $this->quantity > 0 ? $this->name . " " . $this->quantity . ' ' . $this->quantity * round($this->price, 2) . ' ' . ' €' : $this->name;
    }

    /**
     * @return Collection|PriceVariation[]
     */
    public function getPriceVariations(): Collection
    {
        return $this->priceVariations;
    }

    public function addPriceVariation(PriceVariation $priceVariation): self
    {
        if (!$this->priceVariations->contains($priceVariation)) {
            $this->priceVariations[] = $priceVariation;
            $priceVariation->setCrypto($this);
        }

        return $this;
    }

    public function removePriceVariation(PriceVariation $priceVariation): self
    {
        if ($this->priceVariations->removeElement($priceVariation)) {
            // set the owning side to null (unless already changed)
            if ($priceVariation->getCrypto() === $this) {
                $priceVariation->setCrypto(null);
            }
        }

        return $this;
    }
}
