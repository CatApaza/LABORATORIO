<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aeropuerto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variables de filtro
$origen = $destino = $fechaSalida = $fechaLlegada = $tipoViaje = "";

// Procesar el formulario de filtro si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fechaSalida = $_POST['fecha_salida'];
    $fechaLlegada = $_POST['fecha_llegada'];
    $tipoViaje = $_POST['tipo_viaje'];
}

// Construir la consulta SQL con los filtros
$sql = "SELECT * FROM Vuelos WHERE 1=1";

if (!empty($origen)) {
    $sql .= " AND Origen LIKE '%$origen%'";
}
if (!empty($destino)) {
    $sql .= " AND Destino LIKE '%$destino%'";
}
if (!empty($fechaSalida)) {
    $sql .= " AND FechaSalida LIKE '%$fechaSalida%'";
}
if (!empty($fechaLlegada)) {
    $sql .= " AND FechaLlegada LIKE '%$fechaLlegada%'";
}
if (!empty($tipoViaje)) {
    $sql .= " AND TipoVuelo LIKE '%$tipoViaje%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Vuelos</title>
    <style>
    /* Estilo general */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Estilos de la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Estilo de fila alterna */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Estilo de fila al pasar el cursor */
    tr:hover {
        background-color: #e9e9e9;
    }

    /* Estilo del botón */
    .btn {
        padding: 6px 12px;
        background-color: #007BFF;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    /* Estilo del formulario */
    form {
        margin: 20px 0;
    }

    input[type="text"],
    input[type="date"] {
        padding: 8px;
        margin: 0 10px 10px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    </style>
</head>

<body>


    <?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aeropuerto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variables de filtro
$origen = $destino = $fechaSalida = $fechaLlegada = $tipoViaje = "";

// Procesar el formulario de filtro si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fechaSalida = $_POST['fecha_salida'];
    $fechaLlegada = $_POST['fecha_llegada'];
    $tipoViaje = $_POST['tipo_viaje'];
}

// Construir la consulta SQL con los filtros
$sql = "SELECT * FROM Vuelos WHERE 1=1";

if (!empty($origen)) {
    $sql .= " AND Origen LIKE '%$origen%'";
}
if (!empty($destino)) {
    $sql .= " AND Destino LIKE '%$destino%'";
}
if (!empty($fechaSalida)) {
    $sql .= " AND FechaSalida LIKE '%$fechaSalida%'";
}
if (!empty($fechaLlegada)) {
    $sql .= " AND FechaLlegada LIKE '%$fechaLlegada%'";
}
if (!empty($tipoViaje)) {
    $sql .= " AND TipoVuelo LIKE '%$tipoViaje%'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Vuelos</title>
    <style>
    /* Estilo general */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Estilos de la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Estilo de fila alterna */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Estilo de fila al pasar el cursor */
    tr:hover {
        background-color: #e9e9e9;
    }

    /* Estilo del botón */
    .btn {
        padding: 6px 12px;
        background-color: #007BFF;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    /* Estilo del formulario */
    form {
        margin: 20px 0;
    }

    input[type="text"],
    input[type="date"] {
        padding: 8px;
        margin: 0 10px 10px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    </style>
</head>

<body>

    <h2>Lista de Vuelos</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" value="<?php echo $origen;?>">

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" value="<?php echo $destino;?>">

        <label for="fecha_salida">Fecha de Salida:</label>
        <input type="date" id="fecha_salida" name="fecha_salida" value="<?php echo $fechaSalida;?>">

        <label for="fecha_llegada">Fecha de Llegada:</label>
        <input type="date" id="fecha_llegada" name="fecha_llegada" value="<?php echo $fechaLlegada;?>">

        <label for="tipo_viaje">Tipo de Viaje:</label>
        <input type="text" id="tipo_viaje" name="tipo_viaje" value="<?php echo $tipoViaje;?>">

        <input type="submit" class="btn" value="Filtrar">
    </form>

    <table>
    <tr>
        <th>CODIGO</th>
        <th>Empresa</th>
        <th>Precio</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha de Salida</th>
        <th>Fecha de Llegada</th>
        <th>Hora</th>
        <th>Horario</th>
        <th>Tipo de Vuelo</th>
        <th>Modo de Vuelo</th>
        <th></th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $fechaSalidaFormatted = date('d/m/Y', strtotime($row['FechaSalida']));
            $fechaLlegadaFormatted = date('d/m/Y', strtotime($row['FechaLlegada']));
            echo "<tr data-matricula='{$row['Matricula']}' data-empresa='{$row['Empresa']}' data-precio='{$row['Precio']}' data-origen='{$row['Origen']}' data-destino='{$row['Destino']}' data-fecha_salida='{$fechaSalidaFormatted}' data-fecha_llegada='{$fechaLlegadaFormatted}' data-hora='{$row['Hora']}' data-horario='{$row['Horario']}' data-tipo_vuelo='{$row['TipoVuelo']}' data-modo_vuelo='{$row['ModoVuelo']}'>

                <td>{$row['Matricula']}</td>
                <td>{$row['Empresa']}</td>
                <td>{$row['Precio']}</td>
                <td>{$row['Origen']}</td>
                <td>{$row['Destino']}</td>
                <td>{$fechaSalidaFormatted}</td>
                <td>{$fechaLlegadaFormatted}</td>
                <td>{$row['Hora']}</td>
                <td>{$row['Horario']}</td>
                <td>{$row['TipoVuelo']}</td>
                <td>{$row['ModoVuelo']}</td>
                <td>
                    <form method='post' action='boleta.php'>
                        <input type='hidden' name='operador' value='{$row['Operador']}'>
                        <input type='hidden' name='subop' value='{$row['SubOP']}'>
                        <input type='hidden' name='matricula' value='{$row['Matricula']}'>
                        <input type='hidden' name='empresa' value='{$row['Empresa']}'>
                        <input type='hidden' name='precio' value='{$row['Precio']}'>
                        <input type='hidden' name='origen' value='{$row['Origen']}'>
                        <input type='hidden' name='destino' value='{$row['Destino']}'>
                        <input type='hidden' name='fecha_salida' value='{$fechaSalidaFormatted}'>
                        <input type='hidden' name='fecha_llegada' value='{$fechaLlegadaFormatted}'>
                        <input type='hidden' name='hora' value='{$row['Hora']}'>
                        <input type='hidden' name='horario' value='{$row['Horario']}'>
                        <input type='hidden' name='tipo_vuelo' value='{$row['TipoVuelo']}'>
                        <input type='hidden' name='modo_vuelo' value='{$row['ModoVuelo']}'>
                        <button type='submit' class='btn'>Confirmar</button>
                    </form>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='14'>No se encontraron resultados</td></tr>";
    }
    ?>
</table>


</body>

</html>

</body>

</html>