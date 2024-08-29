<?php
// Configura la conexión a la base de datos
$mysqli = new mysqli("localhost", "usuario", "contraseña", "vienalaboratorio");

// Verifica si la conexión fue exitosa
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

// Recupera los datos del formulario
$codigo_informe = $_POST['codigo_informe'];
$proyecto = $_POST['proyecto'];
$ubicacion = $_POST['ubicacion'];
$solicitante = $_POST['solicitante'];
$referencia = $_POST['referencia'];
$fecha = $_POST['fecha'];
$observaciones = $_POST['observaciones'];

// Prepara la consulta SQL
$sql = "INSERT INTO informes (codigo_informe, proyecto, ubicacion, solicitante, referencia, fecha, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssss", $codigo_informe, $proyecto, $ubicacion, $solicitante, $referencia, $fecha, $observaciones);

if (!$stmt->execute()) {
    die("Error en la ejecución de la consulta: " . $stmt->error);
}

// Obtiene el ID del último informe insertado
$informe_id = $stmt->insert_id;
$stmt->close();

// Recupera los datos de la tabla
$tableData = $_POST['tableData']; // Deberías enviar los datos de la tabla en formato JSON

// Prepara la consulta para insertar los datos de la tabla
$sql = "UPDATE informes SET
    codigo_proveta = ?,
    fecha_modelo = ?,
    fecha_rotura = ?,
    fc = ?,
    edad = ?,
    descripcion = ?,
    d1 = ?,
    d2 = ?,
    d3 = ?,
    d4 = ?,
    d5 = ?,
    d6 = ?,
    h1 = ?,
    h2 = ?,
    h3 = ?,
    dprom = ?,
    hprom = ?,
    area = ?,
    peso = ?,
    fmax = ?,
    densidad = ?,
    resistencia = ?,
    f = ?,
    tipo_falla = ?
    WHERE id = ?";

$stmt = $mysqli->prepare($sql);

// Itera sobre los datos de la tabla
foreach ($tableData as $row) {
    $stmt->bind_param(
        "ssssssssssssssssssssssi",
        $row[0], $row[1], $row[2], $row[3], $row[4], $row[5],
        $row[6], $row[7], $row[8], $row[9], $row[10], $row[11],
        $row[12], $row[13], $row[14], $row[15], $row[16], $row[17],
        $row[18], $row[19], $row[20], $row[21], $row[22], $informe_id
    );

    if (!$stmt->execute()) {
        die("Error en la ejecución de la consulta de datos de la tabla: " . $stmt->error);
    }
}

// Cierra la declaración y la conexión
$stmt->close();
$mysqli->close();

echo "Datos guardados correctamente";
?>
