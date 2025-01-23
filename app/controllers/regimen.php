<?php
// app/controllers/RegimenController.php

class RegimenController extends Controller {

    // Mostrar todos los regímenes
    public function index() {
        $regimenModel = new Regimen();
        $regimenes = $regimenModel->obtenerTodosRegimenes();
        $this->view('regimenes/index', ['regimenes' => $regimenes]);
    }

    // Ver detalles de un régimen
    public function ver($id_regimen) {
        $regimenModel = new Regimen();
        $regimen = $regimenModel->obtenerPorId($id_regimen);
        $this->view('regimenes/ver', ['regimen' => $regimen]);
    }
}
?>
