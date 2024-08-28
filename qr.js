document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.querySelector(".wrapper");
    const qrInput = wrapper.querySelector(".form input");
    const generateBtn = wrapper.querySelector(".form button");
    const qrImg = wrapper.querySelector(".qr-code img");

    let preValue;

    generateBtn.addEventListener("click", () => {
        let qrValue = qrInput.value.trim();

        // Verifica si el valor del QR es vacío o si no ha cambiado desde la última generación
        if (!qrValue || preValue === qrValue) return;

        preValue = qrValue;
        generateBtn.innerText = "Generando Código...";

        // Genera la URL para el código QR
        qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${encodeURIComponent(qrValue)}`;

        // Cuando la imagen del QR se carga, actualiza el estado de la interfaz
        qrImg.addEventListener("load", () => {
            generateBtn.innerText = "Generar Código QR";
        });
    });
});
