<?php

namespace App\Controllers;

use App\Models\ModelUsuarios;
use CodeIgniter\Controller;

class Usuarios extends Controller
{
    public function index() // Lista a todos los usuarios
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

    public function detalleUsuario($id) // Lista a un usuario
    {
        $usuarios = new ModelUsuarios();
        $data['titulo'] = 'Detalle';
        $data['usuario'] = $usuarios->obtenerUsuarioPorId($id);

        if (empty($data['usuario']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('no se encontraro el usuario');
        }

        echo view('templates/header', $data);
        echo view('templates/container');
        echo view('Usuarios/detalle_usuario', $data);
        echo view('templates/footer');
    }

    public function crearUsuario($id = false) // Alta o Edita un usuario
    {
        $usuario = new ModelUsuarios();

        if(!$id) { // Alta
            $data['titulo'] = "Alta";
            $data['usuario'] = $this->request->getPost('usuario');
            $data['roles'] = $usuario->obtenerRoles();

            if ($this->request->getMethod() === 'post' && $this->validate([
                    'nombre' => 'required|min_length[3]|max_length[255]',
                    'apellido'  => 'required|min_length[3]|max_length[255]',
                    'usuario'  => 'required|min_length[3]|max_length[255]',
                    'email'  => 'required',
                    'rol'  => 'required|numeric'
                ])) {
                $usuario->save([
                    'nombre' => $this->request->getPost('nombre'),
                    'apellido'  => $this->request->getPost('apellido'),
                    'usuario'  => $data['usuario'],
                    'email'  => $this->request->getPost('email'),
                    'rol'  => $this->request->getPost('rol')
                ]);

                echo view('templates/header', $data);
                echo view('templates/container');
                echo view('Usuarios/exito', $data);
                echo view('templates/footer');

            } else {
                echo view('templates/header', $data);
                echo view('templates/container');
                echo view('Usuarios/alta', $data);
                echo view('templates/footer');
            }
        }
        else { // Editar
            $data['titulo'] = "Editar";
            $data['usuario'] = $this->request->getPost('usuario');
            $data['rolActual'] = $usuario->obtenerRoleDeUsuario($id); //rol actual

            $roles = $usuario->obtenerRoles();
            $posicionRolActual = array_search($data['rolActual'], $roles);
            unset($roles[$posicionRolActual]);
            $data['roles'] = $roles; // resto de roles

            if ($this->request->getMethod() === 'post' && $this->validate([
                    'nombre' => 'required|min_length[3]|max_length[255]',
                    'apellido'  => 'required|min_length[3]|max_length[255]',
                    'usuario'  => 'required|min_length[3]|max_length[255]',
                    'email'  => 'required',
                    'rol'  => 'required'
                ])) {
                $usuario->save([
                    'nombre' => $this->request->getPost('nombre'),
                    'apellido'  => $this->request->getPost('apellido'),
                    'usuario'  => $data['usuario'],
                    'email'  => $this->request->getPost('email'),
                    'rol'  => $this->request->getPost('rol'),
                    'id' => $id
                ]);

                echo view('templates/header', $data);
                echo view('templates/container');
                echo view('Usuarios/exito', $data);
                echo view('templates/footer');

            } else {
                $data['usuario'] = $usuario->obtenerUsuarioPorId($id);

                echo view('templates/header', $data);
                echo view('templates/container');
                echo view('Usuarios/editar', $data);
                echo view('templates/footer');
            }
        }
    }

    public function eliminar($id)
    {
        $usuario = new ModelUsuarios();
        $exito = $usuario->delete($id);

        $data['titulo'] = 'Eliminar';

        if($exito) {
            header('Location: '.base_url().'/usuarios');
            die();
        }
    }
}
