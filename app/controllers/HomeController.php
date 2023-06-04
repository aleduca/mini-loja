<?php

namespace app\controllers;

use app\core\View;
use app\database\models\Product;

class HomeController
{
    public function index()
    {
        $products = Product::all('id,name,slug,price,image');

        View::render('home', ['products' => $products]);
    }
}
