<?php
// app/models/Usuario.php

class Usuario {
    public function obtenerUsuarioPorEmail($email) {
        $db = Database::getInstance();
        $db->query("SELECT * FROM usuarios WHERE email = :email");
        $db->bind(':email', $email);
        return $db->single();
    }

    public function registrarUsuario($nombre, $email, $password) {
        $db = Database::getInstance();
        $db->query("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
        $db->bind(':nombre', $nombre);
        $db->bind(':email', $email);
        $db->bind(':password', password_hash($password, PASSWORD_DEFAULT));
        return $db->execute();
    }
}
?>
