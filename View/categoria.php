<?php
require_once '../Controller/categoriaController.php';

// Crear una instancia del controlador de categorías
$categoriaController = new CategoriaController();

// Obtener todas las categorías usando la instancia del controlador
$categorias = $categoriaController->verCategorias();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>
    <?php include 'includes/header.php'; ?>
</head>
<body>
    <main class="container my-5">
        <h2 class="text-center mb-4">Gestión de Categorías</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categorias)): ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <tr>
                            <td><?php echo $categoria['ID_Categoria']; ?></td>
                            <td><?php echo $categoria['Nombre']; ?></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarCategoriaModal" data-id="<?php echo $categoria['ID_Categoria']; ?>" data-nombre="<?php echo $categoria['Nombre']; ?>">Editar</button>
                                <a href="../Controller/categoriaController.php?action=eliminar&id=<?php echo $categoria['ID_Categoria']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No hay categorías disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearCategoriaModal">Añadir Nueva Categoría</button>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>

    <!-- Modal para Crear Categoría -->
    <div class="modal fade" id="crearCategoriaModal" tabindex="-1" aria-labelledby="crearCategoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearCategoriaModalLabel">Crear Nueva Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/categoriaController.php?action=crear" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Categoría</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Categoría -->
    <div class="modal fade" id="editarCategoriaModal" tabindex="-1" aria-labelledby="editarCategoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarCategoriaModalLabel">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/categoriaController.php?action=actualizar&id=" method="post" id="editarCategoriaForm">
                        <input type="hidden" id="id_categoria" name="id_categoria">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editar_nombre" name="nombre" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para rellenar el modal de edición -->
    <script>
        var editarCategoriaModal = document.getElementById('editarCategoriaModal');
        editarCategoriaModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-nombre');

            var modalTitle = editarCategoriaModal.querySelector('.modal-title');
            var idInput = editarCategoriaModal.querySelector('#id_categoria');
            var nombreInput = editarCategoriaModal.querySelector('#editar_nombre');
            var formAction = document.getElementById('editarCategoriaForm').action;

            modalTitle.textContent = 'Editar Categoría ID ' + id;
            idInput.value = id;
            nombreInput.value = nombre;
            document.getElementById('editarCategoriaForm').action = formAction + id;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
