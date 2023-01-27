<?php

namespace app\controllers;

use app\library\Redirect;
use app\library\View;

class LoginController
{
  public function index()
  {
    return View::render('login');
  }

  public function store()
  {
    Redirect::back();
  }
}
