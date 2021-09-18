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
        $usuarios = $db->query("select u.*, r.nombre as nombreRol from usuarios u join roles r on (u.rol =r.id )");
        return $usuarios->getResultArray();
    }

    public function obtenerUsuarioPorId($id) {
        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
}