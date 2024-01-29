<?php

namespace App\Entity;

use App\Repository\ShoppingCartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShoppingCartRepository::class)]
class ShoppingCart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'shoppingCart', targetEntity: CartItem::class, cascade: ['persist'])]

    private Collection $item;

    #[ORM\ManyToOne]
    private ?Coupon $coupon = null;

    public function __construct()
    {
        $this->item = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, CartItem>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(CartItem $newItem, int $quantity): static
    {
        for ($i = 0; $i < $this->item->count(); $i++) {
            $item = $this->item->get($i);
            if ($item->getProduct()->getId() === $newItem->getProduct()->getId()) {
                $item->setQuantity($item->getQuantity() + 1);
                return $this;
            }
        }

        $this->item->add($newItem);
        $newItem->setShoppingCart($this);
        $newItem->setQuantity($quantity);
        return $this;
    }
    public function removeItem(CartItem $item): static
    {
        if ($this->item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getShoppingCart() === $this) {
                $item->setShoppingCart(null);
            }
        }

        return $this;
    }

    public function getNbProducts(): ?int
    {
        $nbProducts = 0;
        for ($i = 0; $i < $this->item->count(); $i++) {
            $nbProducts += $this->item[$i]->getQuantity();
        }
        return $nbProducts;
    }

    public function getTotalPrice(): ?float
    {
        $total = 0.0;
        for ($i = 0; $i < $this->item->count(); $i++) {
            $total += $this->item[$i]->getProduct()->getPrice() * $this->item[$i]->getQuantity();
        }
        return $total;
    }

    public function getCoupon(): ?Coupon
    {
        return $this->coupon;
    }

    public function setCoupon(?Coupon $coupon): static
    {
        $this->coupon = $coupon;

        return $this;
    }
}
