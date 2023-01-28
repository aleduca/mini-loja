<?php

namespace app\controllers;

use app\library\View;

class StatusCheckoutController
{
  public function success()
  {
    return View::render('success');
  }

  public function cancel()
  {
    return View::render('cancel');
  }
}
