<?php $this->layout('master'); ?>

<div class="container px-4 px-lg-5 mt-5">
  <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <?php foreach ($products as $product) : ?>
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Product image-->
          <img class="card-img-top" src="<?php echo $product->image ?>" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder"><?php echo $product->name ?></h5>
              <!-- Product price-->
              R$ <?php echo number_format($product->price, 2, ',', '.') ?>
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <a class="btn btn-outline-dark mt-auto" href="/cart/add/?id=<?php echo $product->id ?>">Add to Cart - <?php echo $instances['cart']::getQuantity($product); ?></a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>