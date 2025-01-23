<?php
// app/controllers/UsuarioController.php

class UsuarioController extends Controller {

    // Mostrar formulario de registro
    public function registro() {
        $this->view('usuarios/registro');
    }

    // Crear un nuevo usuario
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Crear una nueva instancia de Usuario
            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setEmail($email);
            $usuario->setPassword($password);

            // Guardar usuario en la base de datos
            $usuario->registrar();

            // Redirigir a la página de inicio de sesión
            header("Location: /login");
        } else {
            $this->view('usuarios/registro');
        }
    }

    // Mostrar formulario de login
    public function login() {
        $this->view('usuarios/login');
    }

    // Procesar login
    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = new Usuario();
            $usuarioData = $usuario->obtenerPorEmail($email);

            if ($usuarioData && password_verify($password, $usuarioData['password'])) {
                // Iniciar sesión y redirigir al dashboard
                $_SESSION['usuario_id'] = $usuarioData['id'];
                header("Location: /dashboard");
            } else {
                // Mostrar error de autenticación
                $this->view('usuarios/login', ['error' => 'Credenciales incorrectas']);
            }
        } else {
            $this->view('usuarios/login');
        }
    }

    // Cerrar sesión
    public function logout() {
        session_destroy();
        header("Location: /login");
    }
}
?>
