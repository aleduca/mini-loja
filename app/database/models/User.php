<?php

namespace app\database\models;

class User extends Model
{
  public static string $table = 'users';
  public readonly int $id;
  public readonly string $firstName;
  public readonly string $lastName;
  public readonly string $email;
  public readonly string $password;
  public readonly string $created_at;
  public readonly string $updated_at;
}
