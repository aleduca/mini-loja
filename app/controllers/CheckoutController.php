<?php

namespace app\controllers;

use app\library\Auth;
use app\library\Cart;
use Stripe\StripeClient;
use app\library\CartInfo;
use app\library\Redirect;
use Exception;

class CheckoutController
{
  public function checkout()
  {
    try {

      if (!Auth::auth()) {
        throw new Exception("Para fazer o checkout você precisa estar logado");
      }

      $stripe = new StripeClient($_ENV['STRIPE_KEY']);

      $baseUrl = $_ENV['BASE_URL'];
      $items = [
        'mode' => 'payment',
        'success_url' => "{$baseUrl}/success",
        'cancel_url' => "{$baseUrl}/cancel",
      ];

      foreach (CartInfo::getCart() as $product) {
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

      Redirect::to($checkout_session->url);
    } catch (\Exception $e) {
      var_dump($e->getMessage());
    }
  }
}
