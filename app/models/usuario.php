<?php
// app/models/Usuario.php

class Usuario extends Model {
    private $id;
    private $nombre;
    private $email;
    private $password;

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Métodos para operaciones con la base de datos
    public function registrar() {
        $db = Database::getConnection();
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$this->nombre, $this->email, password_hash($this->password, PASSWORD_DEFAULT)]);
    }

    public function obtenerPorEmail($email) {
        $db = Database::getConnection();
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
