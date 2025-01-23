<?php
// app/models/Regimen.php

class Regimen extends Model {
    private $id;
    private $descripcion;

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    // Método para obtener todos los regímenes
    public function obtenerTodosRegimenes() {
        $db = Database::getConnection();
        $query = "SELECT * FROM regimen";
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener régimen por ID
    public function obtenerPorId($id) {
        $db = Database::getConnection();
        $query = "SELECT * FROM regimen WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
