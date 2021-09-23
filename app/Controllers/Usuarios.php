<?php

namespace App\Controllers;

use App\Models\ModelUsuarios;
use CodeIgniter\Controller;

class Usuarios extends Controller
{

    private $validacion = [
        'nombre' => [
            'rules' => 'required|min_length[3]|max_length[30]',
            'errors' => [
                'required' => 'El nombre es requerido.',
                'min_length' => 'El nombre debe ser minimo de 3 letras.',
                'max_length' => 'El nombre debe ser maximo de 30 letras.'
            ]
        ],
        'apellido' => [
            'rules' => 'required|min_length[3]|max_length[255]',
            'errors' => [
                'required' => 'El apellido es requerido.',
                'min_length' => 'El apellido debe ser minimo de 3 letras.',
                'max_length' => 'El apellido debe ser maximo de 255 letras.'
            ]
        ],
        'usuario' => [
            'rules' => 'required|min_length[3]|max_length[255]',
            'errors' => [
                'required' => 'El usuario es requerido.',
                'min_length' => 'El usuario debe ser minimo de 3 letras.',
                'max_length' => 'El usuario debe ser maximo de 255 letras.'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'El email es requerido.',
                'valid_email' => 'El email no tiene un formato valido.'
            ]
        ],
        'rol'  => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'El rol es requerido.',
                'numeric' => 'El rol debe ser numerico.'
            ]
        ]
    ];

    public function index() // Lista a todos los usuarios
    {
        $usuarios = new ModelUsuarios();
        $data['titulo'] = 'Usuarios';
        $data['usuarios'] = $usuarios->obtenerUsuarios();

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

    public function crearUsuario() // Alta de un usuario
    {
        helper('form');
        $usuario = new ModelUsuarios();
        $data['validacion'] = null;

        $data['titulo'] = "Alta";
        $data['usuario'] = $this->request->getPost('usuario');
        $data['nombre'] = $this->request->getPost('nombre');
        $data['apellido'] = $this->request->getPost('apellido');
        $data['email'] = $this->request->getPost('email');
        $data['rol'] = $this->request->getPost('rol');
        $data['roles'] = $usuario->obtenerRoles();

        if ($this->request->getMethod() === 'post') {
            if ($this->validate($this->validacion)) {
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
            }
            else {
                $data['validacion'] = $this->validator;

                echo view('templates/header', $data);
                echo view('templates/container');
                echo view('Usuarios/alta', $data);
                echo view('templates/footer');
            }
        } else {
            echo view('templates/header', $data);
            echo view('templates/container');
            echo view('Usuarios/alta', $data);
            echo view('templates/footer');
        }
    }

    public function editarUsuario($id) {
        $usuario = new ModelUsuarios();
        $data['titulo'] = "Editar";
        $data['usuario'] = $this->request->getPost('usuario');
        $data['rolActual'] = $usuario->obtenerRoleDeUsuario($id); //rol actual
        $data['validacion'] = null;

        $roles = $usuario->obtenerRoles();
        $posicionRolActual = array_search($data['rolActual'], $roles);
        unset($roles[$posicionRolActual]);
        $data['roles'] = $roles; // resto de roles

        if ($this->request->getMethod() === 'post') {
            if ($this->validate($this->validacion)) {
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
            }
            else {
                $user['usuario'] = $this->request->getPost('usuario');
                $user['nombre'] = $this->request->getPost('nombre');
                $user['apellido'] = $this->request->getPost('apellido');
                $user['email'] = $this->request->getPost('email');
                $user['id'] = $id;
                $data['usuario'] = $user;
                $data['validacion'] = $this->validator;

                echo view('templates/header', $data);
                echo view('templates/container');
                echo view('Usuarios/editar', $data);
                echo view('templates/footer');
            }
        } else {
            $data['usuario'] = $usuario->obtenerUsuarioPorId($id);

            echo view('templates/header', $data);
            echo view('templates/container');
            echo view('Usuarios/editar', $data);
            echo view('templates/footer');
        }
    }

    public function eliminar($id)
    {
        $usuario = new ModelUsuarios();
        $exito = $usuario->delete($id);

        if($exito) {
            header('Location: '.base_url().'/usuarios');
            die();
        }
    }
}
