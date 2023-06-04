<?php

namespace app\controllers;

use app\core\View;
use app\library\Redirect;
use app\services\CartService;

class CartController
{
    private CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService;
    }

    public function index()
    {
        View::render('cart');
    }

    public function add()
    {
        $this->cartService->add();

        return Redirect::back();
    }

      public function update()
      {
          $this->cartService->update();

          return Redirect::to('/cart');
      }

    public function destroy()
    {
        $this->cartService->delete();

        return Redirect::back();
    }
}
