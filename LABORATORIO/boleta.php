<?php
// Verificar si se han recibido los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $operador = $_POST['operador'];
    $subop = $_POST['subop'];
    $matricula = $_POST['matricula'];
    $empresa = $_POST['empresa'];
    $precio = $_POST['precio'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fechaSalida = $_POST['fecha_salida'];
    $fechaLlegada = $_POST['fecha_llegada'];
    $hora = $_POST['hora'];
    $horario = $_POST['horario'];
    $tipoVuelo = $_POST['tipo_vuelo'];
    $modoVuelo = $_POST['modo_vuelo'];
} else {
    echo "No se recibieron datos.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleto de Avión</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        .ticket {
            background-color: #fff;
            padding: 20px;
            border: 2px solid #007BFF;
            width: 700px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            position: relative;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .ticket h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }

        .ticket p {
            margin: 5px 0;
        }

        .ticket .section {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }

        .ticket .section:first-of-type {
            border-top: none;
        }

        .ticket .section div {
            width: 48%;
        }

        .barcode {
            width: 100%;
            height: 50px;
            background-image: url('https://dummyimage.com/600x100/000/fff&text=|||||||||||||||||||||||||||||||||||');
            background-repeat: no-repeat;
            background-position: center;
            margin-top: 20px;
        }

        .logo {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100px;
        }

        .airline {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #007BFF;
        }

        .ticket .highlight {
            color: #007BFF;
            font-weight: bold;
        }

        .print-button {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="ticket" id="ticket">
        <h2>Boleto de Avión</h2>
        <div class="airline">Aeroprimarios</div>
        <img src="./assetsL/images/Logo.jpg" alt="Aeroprimarios Logo" class="logo">
        <div class="section">
            <div>
                <p><strong>Nombre:</strong> <span class="highlight"><?php echo $operador; ?></span></p>
                <p><strong>Apellido:</strong> <span class="highlight"><?php echo $subop; ?></span></p>
            </div>
            <div>
                <p><strong>Matrícula:</strong> <span class="highlight"><?php echo $matricula; ?></span></p>
                <p><strong>Empresa:</strong> <span class="highlight"><?php echo $empresa; ?></span></p>
            </div>
        </div>
        <div class="section">
            <div>
                <p><strong>Origen:</strong> <span class="highlight"><?php echo $origen; ?></span></p>
                <p><strong>Destino:</strong> <span class="highlight"><?php echo $destino; ?></span></p>
            </div>
        </div>
        <div class="section">
            <div>
                <p><strong>Fecha de Salida:</strong> <span class="highlight"><?php echo $fechaSalida; ?></span></p>
                <p><strong>Hora de Salida:</strong> <span class="highlight"><?php echo $hora; ?></span></p>
            </div>
            <div>
                <p><strong>Fecha de Llegada:</strong> <span class="highlight"><?php echo $fechaLlegada; ?></span></p>
                <p><strong>Horario:</strong> <span class="highlight"><?php echo $horario; ?></span></p>
            </div>
        </div>
        <div class="section">
            <div>
                <p><strong>Tipo de Vuelo:</strong> <span class="highlight"><?php echo $tipoVuelo; ?></span></p>
                <p><strong>Modo de Vuelo:</strong> <span class="highlight"><?php echo $modoVuelo; ?></span></p>
            </div>
            <div>
                <p><strong>Precio:</strong> <span class="highlight">$<?php echo $precio; ?></span></p>
            </div>
        </div>
    </div>

    <div class="print-button">
        <button class="btn" onclick="printTicket()">Imprimir Boleto</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        function printTicket() {
            var element = document.getElementById('ticket');
            var opt = {
                margin: [0.5, 0.5, 0.15, 0.15],
                filename: 'boleto.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        }
    </script>

</body>

</html>
