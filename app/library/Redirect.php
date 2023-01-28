<?php

namespace app\library;

class Redirect
{
  public static function to(string $to)
  {
    return header("Location: {$to}");
  }

  public static function back()
  {
    if (isset($_SESSION['redirect'])) {
      return self::to($_SESSION['redirect']['previous']);
    }
  }

  private static function registerFirstRedirect(Route $route)
  {
    $_SESSION['redirect'] = [
      'actual' => $route->uri,
      'previous' => '',
      'request' => $route->request
    ];
  }

  private static function canChangeRedirect(Route $route)
  {
    return $route->uri !== $_SESSION['redirect']['actual'] && $route->request === $_SESSION['redirect']['request'] ||
      $route->uri === $_SESSION['redirect']['actual'] && $route->request !== $_SESSION['redirect']['request'];
  }

  private static function registerRedirect(Route $route)
  {
    if (
      self::canChangeRedirect($route)
    ) {
      $_SESSION['redirect'] = [
        'actual' => $route->uri,
        'previous' => $_SESSION['redirect']['actual'],
        'request' => $route->request
      ];
    }
  }

  public static function register(Route $route)
  {
    (!isset($_SESSION['redirect'])) ?
      self::registerFirstRedirect($route) :
      self::registerRedirect($route);

    if ($route->request !== 'GET') {
      self::refresh();
    }
  }

  public static function refresh()
  {
    if (isset($_SESSION['redirect'])) {
      unset($_SESSION['redirect']);
    }
  }
}
