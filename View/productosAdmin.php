<?php
require_once('../Controller/productoController.php');

// Crear una instancia del controlador de productos
$productoController = new ProductoController();

// Obtener todas las productos usando la instancia del controlador
$productos = $productoController->verProductos();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('includes/header.php'); ?>
</head>

<body>
    <main class="container my-5">
        <h2 class="text-center mb-4">Gestión de Productos</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>ID Categoría</th>
                    <th>ID Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?php echo $producto['ID_Producto']; ?></td>
                            <td><?php echo $producto['Nombre']; ?></td>
                            <td><?php echo $producto['Descripcion']; ?></td>
                            <td><?php echo $producto['Precio']; ?></td>
                            <td><?php echo $producto['Stock']; ?></td>
                            <td><?php echo $producto['ID_cATEGORIA']; ?></td>
                            <td><?php echo $producto['ID_PROVEEDOR']; ?></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarProductoModal" data-id="<?php echo $producto['ID_Producto']; ?> " nombre="<?php echo $producto['Nombre']; ?>" descripcion="<?php echo $producto['Descripcion']; ?>" precio="<?php echo $producto['Precio']; ?>" stock="<?php echo $producto['Stock']; ?>" id_categoria="<?php echo $producto['ID_Categoria']; ?>" id_proveedor="<?php echo $producto['ID_Proveedor']; ?>">Editar</button>
                                <a href=" ../Controller/productoController.php?action=eliminar&id=<?php echo $producto['ID_Producto']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay productos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-center">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearProductoModal">Añadir Nuevo Producto</button>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>

    <!-- Modal para Crear Producto -->
    <div class="modal fade" id="crearProducto" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearProductoModalLabel">Crear Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/productoController.php?action=crear" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria" class="form-label">ID Categoria</label>
                            <input type="number" class="form-control" id="id_categoria" name="id_categoria" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Producto -->
    <div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/productoController.php?action=actualizar" method="post">
                        <input type="hidden" id="id_factura" name="id_factura">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria" class="form-label">ID Categoria</label>
                            <input type="number" class="form-control" id="id_categoria" name="id_categoria" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para rellenar el modal de edición -->
    <script>
        var editarProductoModal = document.getElementById('editarProductoModal')
        editarProductoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-id')
            var nombre = button.getAttribute('nombre')
            var precio = button.getAttribute('precio')
            var stock = button.getAttribute('stock')
            var categoria = button.getAttribute('categoria')
            var proveedor = button.getAttribute('proveedor')

            var modalTitle = editarProductoModal.querySelector('.modal-title')
            var idInput = editarProductoModal.querySelector('#id_producto')
            var precioInput = editarProductoModal.querySelector('#editar_precio')
            var stockInput = editarProductoModal.querySelector('#editar_stock')
            var categoriaInput = editarProductoModal.querySelector('#editar_id_categoria')
            var proveedorInput = editarProductoModal.querySelector('#editar_id_proveedor')

            modalTitle.textContent = 'Editar Producto ID ' + id
            idInput.value = id
            precioInput.value = precio
            stockInput.value = stock
            categoriaInput.value = categoria
            proveedorInput.value = proveedor
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>