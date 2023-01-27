<?php $this->layout('master'); ?>

<h2>Login</h2>

<form action="/login" method="post">
  <input type="text" name="email" value="xandecar@hotmail.com">
  <input type="password" name="password" value="123">
  <button type="submit">Login</button>
</form>