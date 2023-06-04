<?php

namespace app\controllers;

use app\core\View;
use app\library\Redirect;
use app\services\AuthService;

class LoginController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService;
    }

    public function index()
    {
        return View::render('login');
    }

    public function store()
    {
        $this->authService->authenticate();

        return Redirect::to('/');
    }

    public function destroy()
    {
        $this->authService->logout();

        return Redirect::back();
    }
}
