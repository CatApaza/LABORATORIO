const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const path = require('path');

const app = express();
const port = 3000;

// Middleware para parsear el cuerpo de la solicitud
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Servir el archivo HTML
app.use(express.static('public'));

// Ruta para manejar el envío del formulario
app.post('/submit', (req, res) => {
    const formData = req.body;
    const filePath = path.join(__dirname, 'data.txt');

    // Crear un string con los datos del formulario
    let data = 'INFORME DE ENSAYO\n\n';
    for (let key in formData) {
        data += `${key}: ${formData[key]}\n`;
    }
    data += '\n\n';

    // Escribir los datos en el archivo
    fs.appendFile(filePath, data, (err) => {
        if (err) {
            console.error('Error escribiendo el archivo:', err);
            res.status(500).send('Error al guardar los datos.');
        } else {
            res.send('Datos guardados con éxito.');
        }
    });
});

app.listen(port, () => {
    console.log(`Servidor escuchando en http://localhost:${port}`);
});
