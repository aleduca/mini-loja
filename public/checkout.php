<?php

require '../vendor/autoload.php';

use app\library\Cart;
use Stripe\StripeClient;

session_start();

$private_key = 'sk_test_51HG9eAGz3EyK1lQ9JStfmcNf3dAmpvGjH1nnijXE4z6x61Nc5PH6mWCBfkgRexZO95t4TRxm943trwT7Tv0N5Asg00IaaS3h5k';

$stripe = new StripeClient($private_key);

$cart = new Cart;
$productsIncart = $cart->getCart();

$items = [
  'mode' => 'payment',
  'success_url' => 'http://localhost:8000/success.php',
  'cancel_url' => 'http://localhost:8000/cancel.php',
];

foreach ($productsIncart as $product) {
  $items['line_items'][] = [
    'price_data' => [
      'currency' => 'brl',
      'product_data' => [
        'name' => $product->getName()
      ],
      'unit_amount' => $product->getPrice() * 100
    ],
    'quantity' => $product->getQuantity()
  ];
}

$checkout_session = $stripe->checkout->sessions->create($items);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
