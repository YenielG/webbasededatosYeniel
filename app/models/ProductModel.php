<?php
class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO producto (nombre, suplidor, cantidad, precio) VALUES (:nombre, :suplidor, :cantidad, :precio)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':suplidor', $data['suplidor'], PDO::PARAM_STR);
        $stmt->bindValue(':cantidad', $data['cantidad'], PDO::PARAM_STR);
        $stmt->bindValue(':precio', $data['precio'], PDO::PARAM_STR);
        // Añade esta línea inmediatamente después
        $stmt->execute();
    }

    public function read($id) {
        $sql = "SELECT * FROM producto WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data) {
        $sql = "UPDATE producto SET nombre = :nombre, suplidor = :suplidor, cantidad = :cantidad, precio = :precio WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':suplidor', $data['suplidor'], PDO::PARAM_STR);
        $stmt->bindValue(':cantidad', $data['cantidad'], PDO::PARAM_STR);
        $stmt->bindValue(':precio', $data['precio'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $data['id'], PDO::PARAM_INT);
        // Añade esta línea inmediatamente después
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM producto WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAll() {
        $sql = "SELECT * FROM producto";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
