<?php
// app/controllers/ContratoController.php

class ContratoController extends Controller {
    private $contratoService;

    public function __construct(ContratoService $contratoService) {
        $this->contratoService = $contratoService;
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_usuario = $_POST['id_usuario'];
            $id_modalidad = $_POST['id_modalidad'];
            $id_regimen = $_POST['id_regimen'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];

            if ($this->contratoService->crearContrato($id_usuario, $id_modalidad, $id_regimen, $fecha_inicio, $fecha_fin)) {
                echo "Contrato creado con éxito.";
            } else {
                echo "Error al crear el contrato.";
            }
        } else {
            $this->view('contratos/crear');
        }
    }

    public function obtener() {
        $id_contrato = $_GET['id'];
        $contrato = $this->contratoService->obtenerContratoPorId($id_contrato);
        $this->view('contratos/ver', ['contrato' => $contrato]);
    }
}
?>
