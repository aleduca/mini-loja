<?php $this->layout('master'); ?>

<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart - R$
            <?php echo number_format($instances['cart']::getTotal(), 2, ',', '.'); ?>
          </h3>
          <div>
            <!-- <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p> -->
          </div>
        </div>

        <?php if ($instances['cart']::getTotalProductsInCart() <= 0) : ?>
        <h2>Nenhum produto no carrinho</h2>
        <?php endif;  ?>

        <?php foreach ($instances['cart']::getCart() as $product) : ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="<?php echo $product->getImage() ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">
                  <?php echo $product->getName() ?>
                </p>
                <p><span class="text-muted">
                    <?php echo $product->getQuantity() ?> X R$
                    <?php echo number_format($product->getPrice(), 2, ',', '.') ?>
                  </span>
                  <!-- <span class="text-muted">Color: </span>Grey</p> -->
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <form action="/cart/update" method="post">
                  <input type="hidden" name="slug" value="<?php echo $product->getSlug(); ?>">
                  <input id="form1" min="0" name="quantity" value="<?php echo $product->getQuantity() ?>" type="number"
                    class="form-control form-control-sm" />
                  <button type="submit" class="btn btn-sm btn-outline-success">Change</button>
                </form>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">
                  R$
                  <?php echo number_format($product->getQuantity() * $product->getPrice(), 2, ',', '.'); ?>
                </h5>
                <a href="/cart/remove?slug=<?php echo $product->getSlug(); ?>" class="btn btn-outline-danger">Remove</a>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        <?php if ($instances['cart']::getTotalProductsInCart() > 0) : ?>

        <div class="card">
          <div class="card-body">
            <a type="button" href="/checkout" class="btn btn-warning btn-block btn-lg">Proceed to Pay</a>
          </div>
        </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>