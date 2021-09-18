<style>
    .icono-editar:hover {
        color: #0090ff;
        cursor: pointer;
    }

    .icono-eliminar:hover {
        color: #ff3c00;
        cursor: pointer;
    }
</style>

<h2><?= esc($titulo) ?></h2>

<?php if (! empty($usuarios) && is_array($usuarios)) : ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $indice => $usuario): ?>
            <tr>
                <th scope="row"><?= esc($indice) + 1 ?></th>
                <td><?= esc($usuario['nombre']) ?></td>
                <td><?= esc($usuario['apellido']) ?></td>
                <td><?= esc($usuario['usuario']) ?></td>
                <td><?= esc($usuario['email']) ?></td>
                <td><?= esc($usuario['nombreRol']) ?></td>
                <td>
                    <span title="Eliminar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle icono-eliminar" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>
                    <span title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square icono-editar" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </span>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    No se encontraron usuarios para mostrar
<?php endif ?>