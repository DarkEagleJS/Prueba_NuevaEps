<?php
// app/models/Contrato.php

class Contrato extends Model {
    private $id;
    private $id_usuario;
    private $id_modalidad;
    private $id_regimen;
    private $fecha_inicio;
    private $fecha_fin;

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getIdModalidad() {
        return $this->id_modalidad;
    }

    public function setIdModalidad($id_modalidad) {
        $this->id_modalidad = $id_modalidad;
    }

    public function getIdRegimen() {
        return $this->id_regimen;
    }

    public function setIdRegimen($id_regimen) {
        $this->id_regimen = $id_regimen;
    }

    public function getFechaInicio() {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    // Método para crear un contrato
    public function crear() {
        $db = Database::getConnection();
        $query = "INSERT INTO contratos (id_usuario, id_modalidad, id_regimen, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$this->id_usuario, $this->id_modalidad, $this->id_regimen, $this->fecha_inicio, $this->fecha_fin]);
        return $db->lastInsertId();  // Devuelve el ID del contrato creado
    }

    // Método para obtener un contrato por ID
    public function obtenerPorId($id) {
        $db = Database::getConnection();
        $query = "SELECT * FROM contratos WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
