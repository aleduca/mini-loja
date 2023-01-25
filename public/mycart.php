<?php

use app\library\Cart;

require '../vendor/autoload.php';

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();

var_dump($productsInCart);

if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $cart->remove($id);
  header('Location: mycart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <a href="/">Go to home</a>

  <ul>
    <?php if (count($productsInCart) <= 0) : ?>
      Nenhum produto no carrinho
    <?php endif; ?>

    <?php foreach ($productsInCart as $product) : ?>
      <li>
        <?php echo $product->getName(); ?>
        <input type="text" value="<?php echo $product->getQuantity() ?>">
        Price: R$ <?php echo number_format($product->getPrice(), 2, ',', '.') ?>
        Subtotal: R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?>
        <a href="?id=<?php echo $product->getId(); ?>">remove</a>
      </li>
    <?php endforeach; ?>
    <li>Total: R$ <?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></li>
  </ul>

  <hr>

  <a href="checkout.php">Checkout</a>

</body>

</html>