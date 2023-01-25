<?php

namespace app\controllers;

use app\library\View;

class CartController
{
  public function index()
  {
    View::render('cart');
  }
}
