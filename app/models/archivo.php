<?php
// app/models/Archivo.php

class Archivo extends Model {
    private $id;
    private $id_contrato;
    private $nombre;
    private $ruta;

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdContrato() {
        return $this->id_contrato;
    }

    public function setIdContrato($id_contrato) {
        $this->id_contrato = $id_contrato;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getRuta() {
        return $this->ruta;
    }

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    // Método para guardar archivo en la base de datos
    public function guardarArchivo() {
        $db = Database::getConnection();
        $query = "INSERT INTO archivo (id_contrato, nombre, ruta) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$this->id_contrato, $this->nombre, $this->ruta]);
    }

    // Método para obtener archivos por contrato
    public function obtenerPorContrato($id_contrato) {
        $db = Database::getConnection();
        $query = "SELECT * FROM archivo WHERE id_contrato = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id_contrato]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
