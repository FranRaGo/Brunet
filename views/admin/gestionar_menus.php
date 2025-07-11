<?php
require_once __DIR__ . '/../../config/db.php';

if (!empty($_GET['adminTokken']) && $_GET['adminTokken'] === '1234') {
} else {
    header("Location: " . "../../index.php");
    exit();
}
$panelSel = 1;

if (!empty($_POST['panelSel']) && $_POST['panelSel'] == 2) {
    $panelSel = 2;
}

// Añadir categoría
if (isset($_POST['nueva_categoria'])) {
    $stmt = $db->prepare("INSERT INTO categorias (nombre) VALUES (:nombre)");
    $stmt->execute(['nombre' => $_POST['nombre']]);
}

// Eliminar categoría
if (isset($_GET['eliminar_categoria'])) {
    $id = intval($_GET['eliminar_categoria']);
    $stmt = $db->prepare("DELETE FROM categorias WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

// Editar categoría
if (isset($_POST['editar_categoria'])) {
    $stmt = $db->prepare("UPDATE categorias SET nombre = :nombre WHERE id = :id");
    $stmt->execute([
        'nombre' => $_POST['nombre'],
        'id' => $_POST['id']
    ]);
}

// Añadir plato
if (isset($_POST['nuevo_plato'])) {
    $stmt = $db->prepare("INSERT INTO platos (nombre, precio, sugerencia, categoria_id) 
                          VALUES (:nombre, :precio, :sugerencia, :categoria_id)");
    $stmt->execute([
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'sugerencia' => isset($_POST['sugerencia']) ? 1 : 0,
        'categoria_id' => $_POST['categoria_id']
    ]);
}

// Editar plato
if (isset($_POST['editar_plato'])) {
    $stmt = $db->prepare("UPDATE platos SET nombre = :nombre, precio = :precio, sugerencia = :sugerencia, categoria_id = :categoria_id WHERE id = :id");
    $stmt->execute([
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'sugerencia' => isset($_POST['sugerencia']) ? 1 : 0,
        'categoria_id' => $_POST['categoria_id'],
        'id' => $_POST['id']
    ]);
}

// Eliminar plato
if (isset($_GET['eliminar_plato'])) {
    $id = intval($_GET['eliminar_plato']);
    $stmt = $db->prepare("DELETE FROM platos WHERE id = :id");
    $stmt->execute(['id' => $id]);
}

// Obtener categorías
$categorias = $db->query("SELECT * FROM categorias ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

// Obtener platos por categoría
$platos_por_categoria = [];
foreach ($categorias as $cat) {
    $stmt = $db->prepare("SELECT * FROM platos WHERE categoria_id = :id");
    $stmt->execute(['id' => $cat['id']]);
    $platos_por_categoria[$cat['id']] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$stmt = $db->prepare("SELECT * FROM platos");
$stmt->execute();
$platos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Añadir menú diario
if (isset($_POST['nuevo_menu'])) {
    $stmt = $db->prepare("INSERT INTO menus (nombre, precio, max_personas, categoria) VALUES (:nombre, :precio, :max, :categoria)");
    $stmt->execute([
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'max' => $_POST['max_personas'],
        'categoria' => 'grupo'
    ]);
}

// Eliminar menú
if (isset($_GET['eliminar_menu'])) {
    $id = intval($_GET['eliminar_menu']);
    $db->prepare("DELETE FROM menu_platos WHERE menu_id = :id")->execute(['id' => $id]);
    $db->prepare("DELETE FROM menus WHERE id = :id")->execute(['id' => $id]);
}

// Añadir plato a menú existente
if (isset($_POST['anadir_plato_menu'])) {
    $stmt = $db->prepare("INSERT INTO menu_platos (comentario, categoria, plato_id, menu_id) 
                          VALUES (:comentario, :categoria, :plato_id, :menu_id)");
    $stmt->execute([
        'comentario' => $_POST['comentario'],
        'categoria' => $_POST['categoria'],
        'plato_id' => $_POST['plato_id'],
        'menu_id' => $_POST['menu_id']
    ]);
}

// Eliminar plato de un menú
if (isset($_POST['eliminar_plato_menu'])) {
    $stmt = $db->prepare("DELETE FROM menu_platos WHERE menu_id = :menu_id AND plato_id = :plato_id");
    $stmt->execute([
        'menu_id' => $_POST['menu_id'],
        'plato_id' => $_POST['plato_id']
    ]);
}

// Obtener menús con platos
$menus_completos = $db->query("SELECT * FROM menus ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
$platos_por_menu = [];
foreach ($menus_completos as $menu) {
    $stmt = $db->prepare("
        SELECT dp.*, p.nombre 
        FROM menu_platos dp
        JOIN platos p ON p.id = dp.plato_id
        WHERE dp.menu_id = :id
    ");

    $stmt->execute(['id' => $menu['id']]);
    $platos_por_menu[$menu['id']] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php


// Mostrar todas las reservas
$resultado = $db->query("SELECT * FROM reservas ORDER BY fecha, hora")->fetchAll(PDO::FETCH_ASSOC);


?>

<?php // include $_SERVER['DOCUMENT_ROOT'] . '/brunet/assets/includes/header.php'; 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de Carta</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        h2 {
            margin-top: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            vertical-align: top;
        }

        th {
            background-color: #eee;
        }

        input,
        select {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }

        form.inline {
            display: inline;
        }

        .form-section {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
        <form method="post">
            <button name="panelSel" value="<?php if($panelSel == 1){ echo 2; }else{ echo 1; } ?>"><?php if($panelSel == 1){ echo 'Reservas'; }else{ echo 'Carta'; } ?></button>
        </form>
    <?php
    if ($panelSel == 1) {
    ?>

        <h1>Gestión de la Carta</h1>

        <div class="form-section">
            <h2>Añadir Categoría</h2>
            <form method="POST">
                <input type="text" name="nombre" placeholder="Nueva categoría" required>
                <button type="submit" name="nueva_categoria">Añadir</button>
            </form>
        </div>

        <h2>Categorías</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($categorias as $cat): ?>
                <tr>
                    <td><?= $cat['id'] ?></td>
                    <td>
                        <form method="POST" class="inline">
                            <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                            <input type="text" name="nombre" value="<?= htmlspecialchars($cat['nombre']) ?>">
                            <button type="submit" name="editar_categoria">Guardar</button>
                        </form>
                    </td>
                    <td>
                        <a href="?eliminar_categoria=<?= $cat['id'] ?>&adminTokken=1234" onclick="return confirm('¿Eliminar esta categoría y sus platos?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="form-section">
            <h2>Añadir Plato</h2>
            <form method="POST">
                <select name="categoria_id" required>
                    <option value="">Selecciona categoría</option>
                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nombre']) ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <input type="text" name="nombre" placeholder="Nombre del plato" required><br><br>
                <input type="number" step="0.01" name="precio" placeholder="Precio €" required><br><br>
                <label><input type="checkbox" name="sugerencia"> Plato sugerencia</label><br><br>
                <button type="submit" name="nuevo_plato">Añadir plato</button>
            </form>
        </div>

        <h2>Platos por Categoría</h2>
        <?php foreach ($categorias as $cat): ?>
            <h3><?= htmlspecialchars($cat['nombre']) ?></h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Sugerencia</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($platos_por_categoria[$cat['id']] as $plato): ?>
                    <tr>
                        <td><?= $plato['id'] ?></td>
                        <td>
                            <form method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $plato['id'] ?>">
                                <input type="text" name="nombre" value="<?= htmlspecialchars($plato['nombre']) ?>">
                        </td>
                        <td><input type="number" step="0.01" name="precio" value="<?= $plato['precio'] ?>"></td>
                        <td>
                            <label>
                                <input type="checkbox" name="sugerencia" <?= $plato['sugerencia'] ? 'checked' : '' ?>>
                            </label>
                        </td>
                        <td>
                            <select name="categoria_id">
                                <?php foreach ($categorias as $c): ?>
                                    <option value="<?= $c['id'] ?>" <?= $c['id'] == $plato['categoria_id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($c['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="editar_plato">Guardar</button>
                            <a href="?eliminar_plato=<?= $plato['id'] ?>&adminTokken=1234" onclick="return confirm('¿Eliminar este plato?')">Eliminar</a>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>
        <div class="form-section">
            <h2>Añadir Menú Grupo</h2>
            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre del menú" required><br><br>
                <input type="number" name="precio" placeholder="Precio del menú (€)" step="0.01" required><br><br>
                <input type="number" name="max_personas" placeholder="Máx. personas" required><br><br>

                <button type="submit" name="nuevo_menu">Crear Menú</button>
            </form>
        </div>
        <h2>Menus</h2>
        <?php foreach ($menus_completos as $menu): ?>
            <div style="border:1px solid #ccc; padding:10px; margin-bottom:20px;">
                <strong>Menú <?= $menu['nombre'] . " " . $menu['categoria'] ?> - Precio: <?= $menu['precio'] ?> € - Máx. Personas: <?= $menu['max_personas'] ?></strong>
                <?php if ($menu['categoria'] != "diario") { ?>
                    <a href="?eliminar_menu=<?= $menu['id'] ?>" onclick="return confirm('¿Eliminar este menú?')">Eliminar</a>
                <?php } ?>
                <ul>
                    <p>Primer Plato</p>
                    <?php foreach ($platos_por_menu[$menu['id']] as $dp): ?>
                        <?php
                        if ($dp['categoria'] == '1') {
                        ?>
                            <li>
                                <?= htmlspecialchars($dp['nombre']) ?>
                                <?php if ($dp['comentario']): ?>
                                    <em>(<?= htmlspecialchars($dp['comentario']) ?>)</em>
                                <?php endif; ?>

                                <!-- Botón para eliminar plato del menú -->
                                <form method="POST" class="inline" style="display:inline;">
                                    <input type="hidden" name="eliminar_plato_menu" value="1">
                                    <input type="hidden" name="plato_id" value="<?= $dp['plato_id'] ?>">
                                    <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                                    <button type="submit" onclick="return confirm('¿Eliminar este plato del menú?')">Eliminar</button>
                                </form>
                            </li>
                        <?php
                        }
                        ?>
                    <?php endforeach; ?>
                    <p>Segundo Plato</p>
                    <?php foreach ($platos_por_menu[$menu['id']] as $dp): ?>
                        <?php
                        if ($dp['categoria'] == '2') {
                        ?>
                            <li>
                                <?= htmlspecialchars($dp['nombre']) ?>
                                <?php if ($dp['comentario']): ?>
                                    <em>(<?= htmlspecialchars($dp['comentario']) ?>)</em>
                                <?php endif; ?>

                                <!-- Botón para eliminar plato del menú -->
                                <form method="POST" class="inline" style="display:inline;">
                                    <input type="hidden" name="eliminar_plato_menu" value="1">
                                    <input type="hidden" name="plato_id" value="<?= $dp['plato_id'] ?>">
                                    <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                                    <button type="submit" onclick="return confirm('¿Eliminar este plato del menú?')">Eliminar</button>
                                </form>
                            </li>
                        <?php
                        }
                        ?>
                    <?php endforeach; ?>
                    <p>Postre</p>
                    <?php foreach ($platos_por_menu[$menu['id']] as $dp): ?>
                        <?php
                        if ($dp['categoria'] == '3') {
                        ?>
                            <li>
                                <?= htmlspecialchars($dp['nombre']) ?>
                                <?php if ($dp['comentario']): ?>
                                    <em>(<?= htmlspecialchars($dp['comentario']) ?>)</em>
                                <?php endif; ?>

                                <!-- Botón para eliminar plato del menú -->
                                <form method="POST" class="inline" style="display:inline;">
                                    <input type="hidden" name="eliminar_plato_menu" value="1">
                                    <input type="hidden" name="plato_id" value="<?= $dp['plato_id'] ?>">
                                    <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                                    <button type="submit" onclick="return confirm('¿Eliminar este plato del menú?')">Eliminar</button>
                                </form>
                            </li>
                        <?php
                        }
                        ?>
                    <?php endforeach; ?>
                    <p>Bebida</p>
                    <?php foreach ($platos_por_menu[$menu['id']] as $dp): ?>
                        <?php
                        if ($dp['categoria'] == '4') {
                        ?>
                            <li>
                                <?= htmlspecialchars($dp['nombre']) ?>
                                <?php if ($dp['comentario']): ?>
                                    <em>(<?= htmlspecialchars($dp['comentario']) ?>)</em>
                                <?php endif; ?>

                                <!-- Botón para eliminar plato del menú -->
                                <form method="POST" class="inline" style="display:inline;">
                                    <input type="hidden" name="eliminar_plato_menu" value="1">
                                    <input type="hidden" name="plato_id" value="<?= $dp['plato_id'] ?>">
                                    <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                                    <button type="submit" onclick="return confirm('¿Eliminar este plato del menú?')">Eliminar</button>
                                </form>
                            </li>
                        <?php
                        }
                        ?>
                    <?php endforeach; ?>
                </ul>
                <?php
                ?>
                <form method="POST" style="margin-top:10px;">
                    <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                    <select name="plato_id" required>
                        <option value="">Selecciona plato</option>
                        <?php foreach ($categorias as $cat): ?>
                            <optgroup label="<?= htmlspecialchars($cat['nombre']) ?>">
                                <?php foreach ($platos_por_categoria[$cat['id']] as $plato): ?>
                                    <option value="<?= $plato['id'] ?>"><?= htmlspecialchars($plato['nombre']) ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endforeach; ?>
                    </select>

                    <select name="categoria" required>
                        <option value="">Selecciona categoría</option>
                        <option value="1">Primer Plato</option>
                        <option value="2">Segundo Plato</option>
                        <option value="3">Postre</option>
                        <option value="4">Bebida</option>
                    </select>

                    <input type="text" name="comentario" placeholder="Comentario opcional">
                    <button type="submit" name="anadir_plato_menu">Añadir plato</button>
                </form>
                <?php
                ?>
            </div>
        <?php endforeach; ?>
    <?php } else { ?>

        <h2 style="text-align:center;">Listado de Reservas</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre del Cliente</th>
                <th>Telefono</th>
                <th>Zona</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Nº Personas</th>
                <th>Acción</th>
            </tr>
            <?php foreach ($resultado as $row): ?>
                <?php
                $cancelUrl = "http://localhost:8888/brunet/views/client/cancelar_reserva.php?" . http_build_query([
                    'token' => $row['token_cancelacion'],
                    'correo' => $row['email'],
                    'nombre' => $row['nombre'],
                    'fecha' => $row['fecha'],
                    'hora' => $row['hora'],
                    'zona' => $row['zona'],
                ]);
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= $row['telefono'] ?></td>
                    <td><?= $row['zona'] ?></td>
                    <td><?= $row['fecha'] ?></td>
                    <td><?= $row['hora'] ?></td>
                    <td><?= $row['personas'] ?></td>
                    <td>
                        <a href="<?= $cancelUrl ?>" style="background-color:#e74c3c;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;">
                            Cancelar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php } ?>

</body>

</html>