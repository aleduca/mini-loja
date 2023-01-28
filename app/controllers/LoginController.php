<?php

namespace app\controllers;

use app\library\View;
use app\library\Redirect;
use app\database\models\User;
use app\library\Auth;
use Exception;

class LoginController
{
  public function index()
  {
    return View::render('login');
  }

  public function store()
  {

    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $user = User::where('email', $email);

    if (!$user) {
      throw new Exception("Usuário ou senha inválidos");
    }

    if (!password_verify($password, $user->password)) {
      throw new Exception("Usuário ou senha inválidos");
    }

    Auth::loginAs($user);

    return Redirect::to('/');
  }

  public function destroy()
  {
    Auth::logout();

    return Redirect::back();
  }
}
