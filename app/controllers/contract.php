<?php
// app/controllers/ContratoController.php

class ContratoController extends Controller {

    // Crear un contrato
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_usuario = $_POST['id_usuario'];
            $id_modalidad = $_POST['id_modalidad'];
            $id_regimen = $_POST['id_regimen'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];

            $contrato = new Contrato();
            $contrato->setIdUsuario($id_usuario);
            $contrato->setIdModalidad($id_modalidad);
            $contrato->setIdRegimen($id_regimen);
            $contrato->setFechaInicio($fecha_inicio);
            $contrato->setFechaFin($fecha_fin);

            // Guardar contrato
            $contrato->crear();

            // Redirigir a la página de contratos
            header("Location: /contratos");
        } else {
            // Obtener modalidades y regímenes para el formulario
            $modalidadModel = new Modalidad();
            $modalidades = $modalidadModel->obtenerTodasModalidades();

            $regimenModel = new Regimen();
            $regimenes = $regimenModel->obtenerTodosRegimenes();

            $this->view('contratos/crear', ['modalidades' => $modalidades, 'regimenes' => $regimenes]);
        }
    }

    // Mostrar lista de contratos
    public function index() {
        $contratoModel = new Contrato();
        $contratos = $contratoModel->obtenerTodos();
        $this->view('contratos/index', ['contratos' => $contratos]);
    }

    // Ver detalles de un contrato
    public function ver($id_contrato) {
        $contratoModel = new Contrato();
        $contrato = $contratoModel->obtenerPorId($id_contrato);
        $this->view('contratos/ver', ['contrato' => $contrato]);
    }
}
?>
