<section>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const nim = '235150700111030' // Inject the NIM value from the backend

                // Check if NIM is available
                if (nim) {
                    const qrCodeContainer = document.getElementById('qrcode');
                    new QRCode(qrCodeContainer, {
                        text: '235150700111030', // Generate QR code with NIM
                        width: 200, // Width of the QR code
                        height: 200, // Height of the QR code
                    });
                } else {
                    console.error('NIM is not available');
                }
            });
        </script>
</section>
