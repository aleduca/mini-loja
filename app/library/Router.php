<?php

namespace app\library;

class Router
{
  private array $routes = [];

  public function add(
    string $uri,
    string $request,
    string $controller
  ) {
    $this->routes[] = new Route($uri, $request, $controller);
  }

  public function init()
  {
    foreach ($this->routes as $route) {
      if ($route->match($route)) {
        Redirect::register($route);
        return (new Controller)->call($route);
      }
    }

    return (new Controller)->call(new Route('/404', 'GET', 'NotFoundController:index'));
  }
}
