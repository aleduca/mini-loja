<?php

namespace app\controllers;

use app\library\Cart;
use app\library\View;
use app\database\models\User;
use app\database\models\Product;

class HomeController
{
  public function index()
  {
    $products = Product::all('id,name,slug,price,image');

    View::render('home', ['products' => $products]);
  }
}
