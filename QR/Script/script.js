// Get the container element
const qrCodeContainer = document.getElementById('contenedorQR');

// Set the URL of the XLSX file
const xlsxFileUrl = 'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://youtu.be/xWx9_GVHa_k?si=YLs6cFVeUR2BBy1k';

// Generate the QR code
new QRCode(qrCodeContainer, {
  text: xlsxFileUrl,
  width: 256,
  height: 256,
  colorDark: '#000',
  colorLight: '#fff',
  correctLevel: QRCode.CorrectLevel.H,
});