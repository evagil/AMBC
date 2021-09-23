<form action="/usuarios/editar/<?= esc($usuario['id']) ?>" method="post" style="width: 50%; margin: 0 auto">
    <h1>Insertar datos del usuario </h1>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <?php if ($validacion != null && $validacion->hasError('nombre')) { ?>
            <span class="text-danger"> <?= "*".$validacion->getError('nombre'); ?> </span>
        <?php } ?>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($usuario['nombre']) ?>">
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <?php if ($validacion != null && $validacion->hasError('apellido')) { ?>
            <span class="text-danger"> <?= "*".$validacion->getError('apellido'); ?> </span>
        <?php } ?>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= esc($usuario['apellido']) ?>">
    </div>
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <?php if ($validacion != null && $validacion->hasError('usuario')) { ?>
            <span class="text-danger"> <?= "*".$validacion->getError('usuario'); ?> </span>
        <?php } ?>
        <input type="text" class="form-control" id="usuario" name="usuario" value="<?= esc($usuario['usuario']) ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <?php if ($validacion != null && $validacion->hasError('email')) { ?>
            <span class="text-danger"> <?= "*".$validacion->getError('email'); ?> </span>
        <?php } ?>
        <input type="email" class="form-control" id="email" name="email" value="<?= esc($usuario['email']) ?>">
    </div>
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <?php if ($validacion != null && $validacion->hasError('rol')) { ?>
            <span class="text-danger"> <?= "*".$validacion->getError('rol'); ?> </span>
        <?php } ?>
        <select id="rol" class="form-select" name="rol">
            <option value="<?= esc($rolActual['id']); ?>" selected><?= esc($rolActual['nombre']); ?></option>
            <?php foreach ($roles as $rol): ?>
                <option value="<?= esc($rol['id']) ?>"><?= esc($rol['nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>