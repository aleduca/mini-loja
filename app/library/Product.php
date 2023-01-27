<?php

namespace app\library;

class Product
{
  private int $id;
  private string $name;
  private int $price;
  private string $slug;
  private string $image;
  private int $quantity;

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function setPrice(int $price)
  {
    $this->price = $price;
  }

  public function setSlug(string $slug)
  {
    $this->slug = $slug;
  }

  public function setImage(string $image)
  {
    $this->image = $image;
  }

  public function setQuantity(int $quantity)
  {
    $this->quantity = $quantity;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getSlug()
  {
    return $this->slug;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }
}
