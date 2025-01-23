<?php

class UsuarioController extends Controller {
    private $usuarioService;

    public function __construct(UsuarioService $usuarioService) {
        $this->usuarioService = $usuarioService;
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->usuarioService->registrarUsuario($nombre, $email, $password)) {
                echo "Usuario registrado con éxito.";
            } else {
                echo "Error al registrar el usuario.";
            }
        } else {
            $this->view('usuarios/registro');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = $this->usuarioService->obtenerUsuarioPorEmail($email);

            if ($usuario && password_verify($password, $usuario['password'])) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('Location: /');
            } else {
                echo "Credenciales incorrectas.";
            }
        } else {
            $this->view('usuarios/login');
        }
    }
}
?>
