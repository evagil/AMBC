<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsuarios extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'usuario', 'rol'];

    public function obtenerUsuarios()
    {
        $db = \Config\Database::connect();
        $usuarios = $db->query("select u.*, r.nombre as nombreRol from usuarios u join roles r on (u.rol = r.id)");
        $db->close();
        return $usuarios->getResultArray();
    }

    public function obtenerUsuarioPorId($id) {
        $db = \Config\Database::connect();
        $usuario = $db->query("select u.*, r.nombre as nombreRol from usuarios u join roles r on (u.rol = r.id) where u.id = $id");
        $db->close();
        return $usuario->getResultArray()[0];
    }

    public function obtenerRoles()
    {
        $db = \Config\Database::connect();
        $roles = $db->query("select * from roles");
        $db->close();
        return $roles->getResultArray();
    }

    public function obtenerRoleDeUsuario($id)
    {
        $db = \Config\Database::connect();
        $roles = $db->query("select r.* from usuarios u join roles r on (u.rol = r.id) where u.id = $id");
        $db->close();
        return $roles->getResultArray()[0];
    }
}