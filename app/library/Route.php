<?php

namespace app\library;

readonly class Route
{
  public function __construct(
    public string $uri,
    public string $request,
    public string $controller,
  ) {
  }

  private function currentUri()
  {
    return $_SERVER['REQUEST_URI'] !== '/' ? rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') : '/';
  }

  private function currentRequest()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function match()
  {
    if (
      $this->uri === $this->currentUri() &&
      strtolower($this->request) === $this->currentRequest()
    ) {
      return $this;
    }
  }
}
