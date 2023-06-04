<?php

namespace app\services;

use app\entities\ProductEntity;

class CartActionsService
{
    private function init()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function add(ProductEntity $productEntity)
    {
        $this->init();

        $inCart = false;
        $this->setTotal($productEntity);
        $cart = CartInfoService::getCart();
        if (count($cart) > 0) {
            foreach ($cart as $productInCart) {
                if ($productInCart->getId() === $productEntity->getId()) {
                    $quantity = $productInCart->getQuantity() + $productEntity->getQuantity();
                    $productInCart->setQuantity($quantity);
                    $inCart = true;

                    break;
                }
            }
        }

        if (!$inCart) {
            $this->setProductsInCart($productEntity);
        }
    }

    private function setProductsInCart($product)
    {
        if (!isset($_SESSION['cart']['products'])) {
            $_SESSION['cart']['products'] = [];
        }

        $_SESSION['cart']['products'][$product->getSlug()] = $product;
    }

    private function setTotal(ProductEntity $productEntity)
    {
        if (!isset($_SESSION['cart']['total'])) {
            $_SESSION['cart']['total'] = 0;
        }
        $_SESSION['cart']['total'] += $productEntity->getPrice() * $productEntity->getQuantity();
    }

    public function remove(string $slug)
    {
        if (array_key_exists($slug, $_SESSION['cart']['products'])) {
            unset($_SESSION['cart']['products'][$slug]);
        }
    }

    public function update(string $slug, string|int $quantity)
    {
        if (array_key_exists($slug, $_SESSION['cart']['products'])) {
            $product = $_SESSION['cart']['products'][$slug];
            $product->setQuantity($quantity);
        }
    }
}
