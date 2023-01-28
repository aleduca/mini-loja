<?php $this->layout('master') ?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <form method="post" action="/login">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" name="email" class="form-control" value="xandecar@hotmail.com" />
        <label class="form-label" for="form2Example1">Email address</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" name="password" class="form-control" value="123" />
        <label class="form-label" for="form2Example2">Password</label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

  </div>
  </form>
  </div>
</section>