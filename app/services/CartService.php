<?php

namespace app\services;

use app\database\models\Product as ProductModel;
use app\entities\ProductEntity;

class CartService
{
    private CartActionsService $cart;

    public function __construct()
    {
        $this->cart = new CartActionsService;
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $id = strip_tags($_GET['id']);

            $productInfo = ProductModel::where('id', $id);

            $productEntity = new ProductEntity;
            $productEntity->setId($productInfo->id);
            $productEntity->setSlug($productInfo->slug);
            $productEntity->setImage($productInfo->image);
            $productEntity->setName($productInfo->name);
            $productEntity->setPrice($productInfo->price);
            $productEntity->setQuantity(1);

            $this->cart->add($productEntity);
        }
    }

    public function update()
    {
        $slug = strip_tags($_POST['slug']);
        $quantity = strip_tags($_POST['quantity']);

        ($quantity <= 0) ?
          $this->cart->remove($slug) :
          $this->cart->update($slug, $quantity);
    }


    public function delete()
    {
        if (isset($_GET['slug'])) {
            $slug = strip_tags($_GET['slug']);
            $this->cart->remove($slug);
        }
    }
}
