<?php 

class Database {
    public $conn;

    /**
     * Constructor for Database class
     * 
     * @param array $config
     */

     public function __construct($config) {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'],$options);
        } catch (PDOException $e){
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
     }

     /**
      * Query the DB
      *
      * @param string $query
      * @return PDOStatement
      * @throw PDOException
      */

      public function query($query) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
      }
}