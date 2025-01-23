<?php
// app/models/Modalidad.php

class Modalidad extends Model {
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

    // Método para obtener todas las modalidades
    public function obtenerTodasModalidades() {
        $db = Database::getConnection();
        $query = "SELECT * FROM modalidad";
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener modalidad por ID
    public function obtenerPorId($id) {
        $db = Database::getConnection();
        $query = "SELECT * FROM modalidad WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
