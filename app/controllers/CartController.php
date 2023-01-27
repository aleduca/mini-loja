<?php

namespace app\controllers;

use app\library\Cart;
use app\library\View;
use app\library\Product;
use app\library\Redirect;
use app\database\models\Product as ModelsProduct;

class CartController
{
  public function index()
  {
    View::render('cart');
  }

  public function add()
  {
    if (isset($_GET['id'])) {
      $id = strip_tags($_GET['id']);

      $productInfo = ModelsProduct::where('id', $id);

      $product = new Product;
      $product->setId($productInfo->id);
      $product->setSlug($productInfo->slug);
      $product->setImage($productInfo->image);
      $product->setName($productInfo->name);
      $product->setPrice($productInfo->price);
      $product->setQuantity(1);

      $cart = new Cart;
      $cart->add($product);

      Redirect::back();

      // header("Location: /cart");
    }
  }

  public function destroy()
  {
    if (isset($_GET['id'])) {
      $id = strip_tags($_GET['id']);
      $cart = new Cart;
      $cart->remove($id);
      return Redirect::back();
    }
  }
}
