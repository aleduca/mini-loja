<?php

namespace app\services;

class AuthInfoService
{
    public static function isAuth()
    {
        return isset($_SESSION['auth']);
    }

    public static function auth()
    {
        if (self::isAuth()) {
            return $_SESSION['auth'];
        }

        return null;
    }
}
