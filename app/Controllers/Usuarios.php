<?php

namespace App\Controllers;

use App\Models\ModelUsuarios;
use CodeIgniter\Controller;

class Usuarios extends Controller
{
    public function index()
    {
        $usuarios = new ModelUsuarios();
        $data['titulo'] = 'Usuarios';
        $data['usuarios'] = $usuarios->obtenerUsuarios();

        if (empty($data['usuarios']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('no se encontraron usuarios');
        }

        echo view('templates/header', $data);
        echo view('templates/container');
        echo view('Usuarios/listado_usuarios', $data);
        echo view('templates/footer');
    }
}
