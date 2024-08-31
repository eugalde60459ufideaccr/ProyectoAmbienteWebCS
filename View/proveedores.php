<?php include('includes/header.php'); ?>
<?php require_once('../Model/conexionModel.php');
require_once('../Model/proveedorModel.php');
require_once('../Controller/proveedorController.php');

// Función para obtener proveedor por ID
function obtenerProveedorPorId($id)
{
    global $conn;
    $resultado = $conn->query("SELECT * FROM proveedor WHERE id_Proveedor = $id");
    return $resultado->fetch_assoc();
}

// Operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crear o actualizar proveedor
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    if (isset($_POST['id'])) {
        // Actualizar proveedor
        $id = $_POST['id'];
        $conn->query("UPDATE proveedor SET Nombre='$nombre', Contacto='$contacto' WHERE id=$id");
    } else {
        // Crear nuevo proveedor
        $conn->query("INSERT INTO proveedor (Nombre, Contacto) VALUES ('$nombre', '$contacto')");
    }
} elseif (isset($_GET['delete'])) {
    // Eliminar proveedor
    $id = $_GET['delete'];
    $conn->query("DELETE FROM proveedores WHERE id=$id");
}

// Obtener lista de proveedores
$proveedores = $conn->query("SELECT * FROM proveedor");

// Obtener proveedor específico si se solicita
$proveedor = null;
if (isset($_GET['id'])) {
    $proveedor = obtenerProveedorPorId($_GET['id']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proveedores</title>
</head>

<body>
    <h1>Proveedores</h1>
    <form method="POST" action="proveedores.php">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="contacto" placeholder="Contacto" required>
        <button type="submit">Guardar</button>
    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $proveedores->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['contacto']; ?></td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarProveedorModal" data-id="<?php echo $proveedor['ID_Provedor']; ?>" nombre="<?php echo $proveedor['Nombre']; ?>" contacto="<?php echo $proveedor['Contacto']; ?>">Editar</button>
                    <a href="../Controller/facturaController.php?action=eliminar&id=<?php echo $producto['ID_Producto']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta factura?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($proveedor): ?>
        <h2>Detalles del Proveedor</h2>
        <p>Nombre: <?php echo $proveedor['nombre']; ?></p>
        <p>Contacto: <?php echo $proveedor['contacto']; ?></p>
    <?php endif; ?>
</body>

</html>
<?php include('includes/footer.php'); ?>

<!-- Modal para Crear Producto -->
<div class="modal fade" id="crearProveedor" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
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
                        <input type="number" class="form-control" id="contacto" name="contacto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Proveedor</button>
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
                <h5 class="modal-title" id="editarProveedorModalLabel">Editar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../Controller/proveedorController.php?action=actualizar" method="post">
                    <input type="hidden" id="id_proveedor" name="id_proveedor">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="contacto" class="form-label">Contacto</label>
                        <input type="number" class="form-control" id="contacto" name="contacto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
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
        var contacto = button.getAttribute('contacto')

        var modalTitle = editarProveedorModal.querySelector('.modal-title')
        var idInput = editarProveedorModal.querySelector('#id_proveedor')
        var nombreInput = editarProveedorModal.querySelector('#editar_nombre')
        var contactoInput = editarProveedorModal.querySelector('#editar_contacto')

        modalTitle.textContent = 'Editar Proveedor ID ' + id
        idInput.value = id
        nombreInput.value = nombre
        contactoInput.value = contacto
    })
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>

</html>