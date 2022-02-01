<?php

  class DBAccess {
    private $dsn = "";
    private $user = "";
    private $pwd = "";
    private $conn = "";

    public function __construct() {
      $this->dsn = 'mysql:dbname=QR;host=localhost;charset=utf8';
      $this->user = 'root';
      $this->pwd = "";

      $this->conn = new PDO($this->dsn, $this->user, $this->pwd);

      return $this->conn;
    }

    public function select($sql, $params = null) {


      $ret = null;

      if (is_null($params)) {
         $stmt = $this->conn->query($sql);

      } else {
        $stmt = $this->conn->prepare($sql);

        $i = 1;
        foreach ($params as $param) {
          $stmt->bindValue($i, $param);
          $i++;
        }

        $stmt->execute();
      }
      
      $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $ret;
    }

    public function execute($sql, $params) {
      $stmt = $this->conn->prepare($sql);

      $i = 1;
      foreach ($params as $param) {
        $stmt->bindValue($i, $param);
        $i++;
      }

      return $stmt->execute();
    }
  }