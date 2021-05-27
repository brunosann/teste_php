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

  public function paginate(int $page)
  {
    $perPage = 5;
    $currentPage = ($perPage * $page) - $perPage;

    $rows = $this->conn
      ->query("SELECT COUNT(*) AS total FROM $this->table")
      ->fetch(PDO::FETCH_OBJ)->total;

    $pages = ceil($rows / $perPage);

    $users = $this->conn
      ->query("SELECT * FROM $this->table LIMIT $perPage OFFSET $currentPage")
      ->fetchAll(PDO::FETCH_OBJ);

    return ['rows' => $rows, 'pages' => $pages, 'users' => $users];
  }
}
