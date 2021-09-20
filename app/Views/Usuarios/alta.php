<form action="/usuarios/alta" method="post" style="width: 50%; margin: 0 auto">
    <h1>Insertar datos del usuario </h1>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido">
    </div>
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <select id="rol" class="form-select" name="rol">
            <option value="false" selected>Choose...</option>
            <?php foreach ($roles as $rol): ?>
                <option value="<?= esc($rol['id']) ?>"><?= esc($rol['nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Cargar</button>
    </div>
</form>