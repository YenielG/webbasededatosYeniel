// Este código es un ejemplo de una clase en PHP llamada "Database" que se utiliza para conectarse a una base de datos MySQL

<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'inventario';
    private $username = 'student';
    private $password = 'contraseña_segura';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}


?>
