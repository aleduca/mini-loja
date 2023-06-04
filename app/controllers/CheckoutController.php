<?php

namespace app\controllers;

use app\library\Redirect;
use app\services\CheckoutService;

class CheckoutController
{
    public function checkout()
    {
        try {
            $checoutService = new CheckoutService;
            $$checkout_session = $checoutService->checkout();
            Redirect::to($checkout_session->url);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
