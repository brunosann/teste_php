<?php

class DB
{
  private $table;
  private $conn;

  public function __construct(string $table)
  {
    $this->table = $table;
    $this->conn = $this->connection();
  }

  private function connection()
  {
    $pdo = new PDO('mysql:host=localhost;dbname=teste_php', 'root', '');
    return $pdo;
  }

  public function getById(int $id)
  {
    $rawSql = "SELECT * FROM $this->table WHERE id = :id";
    $sql = $this->conn->prepare($rawSql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    $user = $sql->fetch(PDO::FETCH_OBJ);
    return $user;
  }
}
