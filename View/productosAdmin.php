<?php
require_once('../Controller/productoController.php');

$productoController = new ProductoController();
$productos = $productoController->verProductos();
$categorias = $productoController->obtenerCategorias();
$proveedores = $productoController->obtenerProveedores();
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
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>ID Categoría</th>
                    <th>ID Proveedor</th>
                    <th>Imagen</th>
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
                            <td><?php echo $producto['ID_Categoria']; ?></td>
                            <td><?php echo $producto['ID_Proveedor']; ?></td>
                            <td><img src="../<?php echo $producto['Imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>" width="100"></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarProductoModal" data-id="<?php echo $producto['ID_Producto']; ?>" data-nombre="<?php echo $producto['Nombre']; ?>" data-descripcion="<?php echo $producto['Descripcion']; ?>" data-precio="<?php echo $producto['Precio']; ?>" data-stock="<?php echo $producto['Stock']; ?>" data-id_categoria="<?php echo $producto['ID_Categoria']; ?>" data-id_proveedor="<?php echo $producto['ID_Proveedor']; ?>" data-imagen="<?php echo $producto['Imagen']; ?>">Editar</button>
                                <a href="../Controller/productoController.php?action=eliminar&id_producto=<?php echo $producto['ID_Producto']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">No hay productos disponibles</td>
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
    <div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearProductoModalLabel">Crear Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/productoController.php?action=crear" method="post" enctype="multipart/form-data">
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
                            <label for="id_categoria" class="form-label">Categoría</label>
                            <select class="form-control" id="id_categoria" name="id_categoria" required>
                                <option value="">Seleccione una categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria['ID_Categoria']; ?>"><?php echo $categoria['Nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_proveedor" class="form-label">Proveedor</label>
                            <select class="form-control" id="id_proveedor" name="id_proveedor" required>
                                <option value="">Seleccione un proveedor</option>
                                <?php foreach ($proveedores as $proveedor): ?>
                                    <option value="<?php echo $proveedor['ID_Proveedor']; ?>"><?php echo $proveedor['Nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
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
                    <form action="../Controller/productoController.php?action=actualizar" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="id_producto" name="id_producto">
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
                            <label for="id_categoria" class="form-label">Categoría</label>
                            <select class="form-control" id="editar_id_categoria" name="id_categoria" required>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria['ID_Categoria']; ?>"><?php echo $categoria['Nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_proveedor" class="form-label">Proveedor</label>
                            <select class="form-control" id="editar_id_proveedor" name="id_proveedor" required>
                                <?php foreach ($proveedores as $proveedor): ?>
                                    <option value="<?php echo $proveedor['ID_Proveedor']; ?>"><?php echo $proveedor['Nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen Actual</label>
                            <img id="imagen_preview" src="" alt="Imagen Actual" width="100">
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Cambiar Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
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
            var nombre = button.getAttribute('data-nombre')
            var descripcion = button.getAttribute('data-descripcion')
            var precio = button.getAttribute('data-precio')
            var stock = button.getAttribute('data-stock')
            var id_categoria = button.getAttribute('data-id_categoria')
            var id_proveedor = button.getAttribute('data-id_proveedor')
            var imagen = button.getAttribute('data-imagen')

            var modalTitle = editarProductoModal.querySelector('.modal-title')
            var idInput = editarProductoModal.querySelector('#id_producto')
            var nombreInput = editarProductoModal.querySelector('#nombre')
            var descripcionInput = editarProductoModal.querySelector('#descripcion')
            var precioInput = editarProductoModal.querySelector('#precio')
            var stockInput = editarProductoModal.querySelector('#stock')
            var categoriaInput = editarProductoModal.querySelector('#editar_id_categoria')
            var proveedorInput = editarProductoModal.querySelector('#editar_id_proveedor')
            var imagenPreview = editarProductoModal.querySelector('#imagen_preview')

            modalTitle.textContent = 'Editar Producto ID ' + id
            idInput.value = id
            nombreInput.value = nombre
            descripcionInput.value = descripcion
            precioInput.value = precio
            stockInput.value = stock
            categoriaInput.value = id_categoria
            proveedorInput.value = id_proveedor
            imagenPreview.src = '../' + imagen // Set the current image path to preview
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>