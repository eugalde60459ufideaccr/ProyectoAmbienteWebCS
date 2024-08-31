<?php include('includes/header.php'); ?>
<?php 
require_once('../Model/conexionModel.php');
require_once('../Model/proveedorModel.php');
require_once('../Controller/proveedorController.php');

// Initialize the connection
$conn = new Conexion();
$conn = $conn->getConn();

// Función para obtener proveedor por ID
function obtenerProveedorPorId($id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM proveedor WHERE ID_Proveedor = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Operaciones CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("UPDATE proveedor SET Nombre = ?, Contacto = ? WHERE ID_Proveedor = ?");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $contacto);
        $stmt->bindParam(3, $id);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("INSERT INTO proveedor (Nombre, Contacto) VALUES (?, ?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $contacto);
        $stmt->execute();
    }
} elseif (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM proveedor WHERE ID_Proveedor = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
}

// Obtener lista de proveedores
$stmt = $conn->prepare("SELECT * FROM proveedor");
$stmt->execute();
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener proveedor específico si se solicita
$proveedor = null;
if (isset($_GET['id'])) {
    $proveedor = obtenerProveedorPorId($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="es">

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
        <?php foreach ($proveedores as $row): ?>
            <tr>
                <td><?php echo $row['Nombre']; ?></td>
                <td><?php echo $row['Contacto']; ?></td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarProveedorModal" data-id="<?php echo $row['ID_Proveedor']; ?>" data-nombre="<?php echo $row['Nombre']; ?>" data-contacto="<?php echo $row['Contacto']; ?>">Editar</button>
                    <a href="proveedores.php?delete=<?php echo $row['ID_Proveedor']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($proveedor): ?>
        <h2>Detalles del Proveedor</h2>
        <p>Nombre: <?php echo $proveedor['Nombre']; ?></p>
        <p>Contacto: <?php echo $proveedor['Contacto']; ?></p>
    <?php endif; ?>

    <!-- Modal para Crear Proveedor -->
    <div class="modal fade" id="crearProveedorModal" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearProveedorModalLabel">Crear Nuevo Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proveedores.php" method="post">
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
                    <form action="proveedores.php" method="post">
                        <input type="hidden" id="id_proveedor" name="id">
                        <div class="mb-3">
                            <label for="editar_nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editar_nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="editar_contacto" class="form-label">Contacto</label>
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

            modalTitle.textContent = 'Editar Proveedor ID ' + id;
            idInput.value = id;
            nombreInput.value = nombre;
            contactoInput.value = contacto;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>

</html>
<?php include('includes/footer.php'); ?>
