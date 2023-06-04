<?php

namespace app\controllers;

use app\core\View;

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
