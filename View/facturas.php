<?php
require_once '../Controller/facturaController.php';

// Crear una instancia del controlador de facturas
$facturaController = new FacturaController();

// Obtener todas las facturas usando la instancia del controlador
$facturas = $facturaController->verFacturas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'includes/header.php'; ?>
</head>
<body>
    <!-- Comienzo del contenido principal -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Gestión de Facturas</h2>

        <!-- Tabla para mostrar las facturas -->
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>ID Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($facturas)): ?>
                    <?php foreach($facturas as $factura): ?>
                        <tr>
                            <td><?php echo $factura['ID_Factura']; ?></td>
                            <td><?php echo $factura['Fecha']; ?></td>
                            <td><?php echo $factura['Total']; ?></td>
                            <td><?php echo $factura['ID_Usuario']; ?></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarFacturaModal" data-id="<?php echo $factura['ID_Factura']; ?>" data-fecha="<?php echo $factura['Fecha']; ?>" data-total="<?php echo $factura['Total']; ?>" data-usuario="<?php echo $factura['ID_Usuario']; ?>">Editar</button>
                                <a href="../Controller/facturaController.php?action=eliminar&id=<?php echo $factura['ID_Factura']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta factura?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay facturas disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="text-center">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearFacturaModal">Añadir Nueva Factura</button>
        </div>
    </main>
    <!-- Fin del contenido principal -->

    <?php include 'includes/footer.php'; ?>

    <!-- Modal para Crear Factura -->
    <div class="modal fade" id="crearFacturaModal" tabindex="-1" aria-labelledby="crearFacturaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearFacturaModalLabel">Crear Nueva Factura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/facturaController.php?action=crear" method="post">
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="datetime-local" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" step="0.01" class="form-control" id="total" name="total" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_usuario" class="form-label">ID Usuario</label>
                            <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Factura</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Factura -->
    <div class="modal fade" id="editarFacturaModal" tabindex="-1" aria-labelledby="editarFacturaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarFacturaModalLabel">Editar Factura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/facturaController.php?action=actualizar" method="post">
                        <input type="hidden" id="id_factura" name="id_factura">
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="datetime-local" class="form-control" id="editar_fecha" name="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" step="0.01" class="form-control" id="editar_total" name="total" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_usuario" class="form-label">ID Usuario</label>
                            <input type="number" class="form-control" id="editar_id_usuario" name="id_usuario" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Factura</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para rellenar el modal de edición -->
    <script>
        var editarFacturaModal = document.getElementById('editarFacturaModal')
        editarFacturaModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-id')
            var fecha = button.getAttribute('data-fecha')
            var total = button.getAttribute('data-total')
            var usuario = button.getAttribute('data-usuario')

            var modalTitle = editarFacturaModal.querySelector('.modal-title')
            var idInput = editarFacturaModal.querySelector('#id_factura')
            var fechaInput = editarFacturaModal.querySelector('#editar_fecha')
            var totalInput = editarFacturaModal.querySelector('#editar_total')
            var usuarioInput = editarFacturaModal.querySelector('#editar_id_usuario')

            modalTitle.textContent = 'Editar Factura ID ' + id
            idInput.value = id
            fechaInput.value = fecha
            totalInput.value = total
            usuarioInput.value = usuario
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
