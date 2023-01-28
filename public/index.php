<?php

require './bootstrap.php';

try {
  $route->add('/', 'GET', 'HomeController:index');
  $route->add('/cart', 'GET', 'CartController:index');
  $route->add('/cart/add', 'GET', 'CartController:add');
  $route->add('/cart/remove', 'GET', 'CartController:destroy');
  $route->add('/cart/update', 'POST', 'CartController:update');
  $route->add('/login', 'GET', 'LoginController:index');
  $route->add('/login', 'POST', 'LoginController:store');
  $route->add('/logout', 'GET', 'LoginController:destroy');
  $route->add('/checkout', 'GET', 'CheckoutController:checkout');
  $route->add('/success', 'GET', 'StatusCheckoutController:success');
  $route->add('/cancel', 'GET', 'StatusCheckoutController:cancel');
  $route->add('/webhook', 'GET', 'WebhookController:payment');
  $route->init();
} catch (Exception $e) {
  var_dump($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
}
