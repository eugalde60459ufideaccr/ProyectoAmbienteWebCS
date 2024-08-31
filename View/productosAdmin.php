<?php include('includes/header.php'); ?>
<?php require_once('../Model/conexionModel.php');
require_once('../Model/productoModel.php');
require_once('../Controller/productoController.php');

// Inicializar la conexión
$conn = (new Conexion())->getConn();

// Verifica si la conexión fue exitosa
if ($conn) {
    // Obtener lista de productos
    $stmt = $conn->query("SELECT * FROM producto");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("Error al conectar a la base de datos.");
}

// Función para obtener producto por ID
function obtenerProductoPorId($id)
{
    global $conn;
    $resultado = $conn->query("SELECT * FROM productos WHERE id = $id");
    return $resultado->fetch(PDO::FETCH_ASSOC);
}

// Operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crear o actualizar producto
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $id_proveedor = $_POST['id_proveedor'];
    if (isset($_POST['id'])) {
        // Actualizar producto
        $id = $_POST['id'];
        $conn->query("UPDATE producto SET Nombre='$nombre', Descripcion='$descripcion', Precio='$precio', Stock='$stock', ID_Categoria='$id_categoria', ID_Proveedor='$id_proveedor' WHERE id=$id");
        // Crear nuevo producto
        $conn->query("INSERT INTO productos (Nombre, Descripcion, Precio, Stock, ID_Categoria, ID_Proveedor) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$id_categoria', '$id_proveedor')");
    }
} elseif (isset($_GET['delete'])) {
    // Eliminar producto
    $id = $_GET['delete'];
    $conexion->query("DELETE FROM producto WHERE id=$id");
}

// Obtener lista de productoss
$productos = $conn->query("SELECT * FROM producto");

// Obtener producto específico si se solicita
$producto = null;
if (isset($_GET['id'])) {
    $producto = obtenerProductoPorId($_GET['id']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
</head>

<body>
    <h1>Productos</h1>
    <form method="POST" action="productosAdmin.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <input type="number" name="precio" placeholder="Precio" required>
        <input type="number" name="stock" placeholder="Stock" required>
        <input type="number" name="id_categoria" placeholder="ID Categoría" required>
        <input type="number" name="id_proveedor" placeholder="ID Proveedor" required>
        <button type="submit">Guardar</button>
    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>ID Categoría</th>
            <th>ID Proveedor</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $productos->fetchAll(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Descripcion']; ?></td>
                <td><?php echo $row['Precio']; ?></td>
                <td><?php echo $row['Stock']; ?></td>
                <td><?php echo $row['ID_Categoria']; ?></td>
                <td><?php echo $row['ID_Proveedor']; ?></td>
                <td>
                    <a href="productosAdmin.php?edit=<?php echo $row['id']; ?>">Editar</a>
                    <a href="productosAdmin.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
                    <a href="productosAdmin.php?id=<?php echo $row['id']; ?>">Detalles</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($producto): ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>ID Categoría</th>
                <th>ID Proveedor</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $productos->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['Precio']; ?></td>
                    <td><?php echo $row['Stock']; ?></td>
                    <td><?php echo $row['ID_Categoria']; ?></td>
                    <td><?php echo $row['ID_Proveedor']; ?></td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarProductoModal" data-id="<?php echo $producto['ID_Producto']; ?>" precio="<?php echo $producto['Precio']; ?>" stock="<?php echo $producto['Stock']; ?>" categoria="<?php echo $producto['ID_Categoria']; ?>" proveedor="<?php echo $producto['ID_Proveedor']; ?>">Editar</button>
                        <a href="../Controller/facturaController.php?action=eliminar&id=<?php echo $producto['ID_Producto']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta factura?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

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