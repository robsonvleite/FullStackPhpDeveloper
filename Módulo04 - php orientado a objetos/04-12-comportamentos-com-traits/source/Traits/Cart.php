<?php

namespace Source\Traits;

class Cart
{
    use UserTrait;
    use AddressTrait;

    protected $products;
    protected $cart;

    public function add($id, $product, $qtde, $price)
    {
        $this->products[$id] = [
            "product" => $product,
            "quantidade" => $qtde,
            "price" => $price,
            "total" => $qtde * $price
        ];

        $this->cart += $qtde * $price;
    }

    public function remove($id, $qtde)
    {
        $this->cart -= $qtde * $this->products[$id]["price"];

        if ($this->products[$id]["quantidade"] > $qtde) {
            $this->products[$id]["quantidade"] -= $qtde;
            $this->products[$id]["total"] = $this->products[$id]["quantidade"] * $this->products[$id]["price"];
        } else {
            unset($this->products[$id]);
        }
    }

    public function checkout(User $user, Address $address)
    {
        $this->setUser($user);
        $this->setAddress($address);
    }
}
