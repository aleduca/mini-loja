<?php

require '../vendor/autoload.php';

$payload = @file_get_contents('php://input');

file_put_contents('log.txt', $payload);

try {
  $event = \Stripe\Event::constructFrom(
    json_decode($payload, true)
  );
} catch (\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  exit();
}

switch ($event->type) {
  case 'payment_intent.succeeded':
    $paymentIntent = $event->data->object;

    file_put_contents('log.txt', $event);

    // contains a \Stripe\PaymentIntent
    // Then define and call a method to handle the successful payment intent.
    // handlePaymentIntentSucceeded($paymentIntent);
    break;
  case 'charge.succeeded':
    $paymentMethod = $event->data->object;
    file_put_contents('log.txt', $event->data->object);
    // contains a \Stripe\PaymentMethod
    // Then define and call a method to handle the successful attachment of a PaymentMethod.
    // handlePaymentMethodAttached($paymentMethod);
    break;
    // ... handle other event types
  default:
    echo 'Received unknown event type ' . $event->type;
}
