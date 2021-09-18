<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Inicio extends Controller {
    public function index()
    {
        $data['titulo'] = 'Inicio';

        echo view('templates/header', $data);
        echo view('templates/container');
        echo view('inicio/inicio');
        echo view('templates/footer');
    }
}