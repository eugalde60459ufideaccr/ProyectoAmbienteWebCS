<?php
require_once '../Controller/proveedorController.php';

// Crear una instancia del controlador de proveedores
$proveedorController = new ProveedorController();

// Obtener todos los proveedores usando la instancia del controlador
$proveedores = $proveedorController->verProveedores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proveedores</title>
    <?php include 'includes/header.php'; ?>
</head>
<body>
    <main class="container my-5">
        <h2 class="text-center mb-4">Gestión de Proveedores</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($proveedores)): ?>
                    <?php foreach ($proveedores as $proveedor): ?>
                        <tr>
                            <td><?php echo $proveedor['ID_Proveedor']; ?></td>
                            <td><?php echo $proveedor['Nombre']; ?></td>
                            <td><?php echo $proveedor['Contacto']; ?></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarProveedorModal" data-id="<?php echo $proveedor['ID_Proveedor']; ?>" data-nombre="<?php echo $proveedor['Nombre']; ?>" data-contacto="<?php echo $proveedor['Contacto']; ?>">Editar</button>
                                <a href="../Controller/proveedorController.php?action=eliminar&id=<?php echo $proveedor['ID_Proveedor']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay proveedores disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearProveedorModal">Añadir Nuevo Proveedor</button>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>

    <!-- Modal para Crear Proveedor -->
    <div class="modal fade" id="crearProveedorModal" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearProveedorModalLabel">Crear Nuevo Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/proveedorController.php?action=crear" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="contacto" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="contacto" name="contacto" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Proveedor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Proveedor -->
    <div class="modal fade" id="editarProveedorModal" tabindex="-1" aria-labelledby="editarProveedorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarProveedorModalLabel">Editar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/proveedorController.php?action=actualizar" method="post" id="editarProveedorForm">
                        <input type="hidden" id="id_proveedor" name="id_proveedor">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editar_nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="contacto" class="form-label">Contacto</label>
                            <input type="text" class="form-control" id="editar_contacto" name="contacto" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para rellenar el modal de edición -->
    <script>
        var editarProveedorModal = document.getElementById('editarProveedorModal');
        editarProveedorModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-nombre');
            var contacto = button.getAttribute('data-contacto');

            var modalTitle = editarProveedorModal.querySelector('.modal-title');
            var idInput = editarProveedorModal.querySelector('#id_proveedor');
            var nombreInput = editarProveedorModal.querySelector('#editar_nombre');
            var contactoInput = editarProveedorModal.querySelector('#editar_contacto');
            var formAction = document.getElementById('editarProveedorForm').action;

            modalTitle.textContent = 'Editar Proveedor ID ' + id;
            idInput.value = id;
            nombreInput.value = nombre;
            contactoInput.value = contacto;
            document.getElementById('editarProveedorForm').action = formAction + '&id=' + id;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
