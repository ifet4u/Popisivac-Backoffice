<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barkod Skener</title>
    <script src="{{asset('assets/qrscanner.js')}}"></script>

</head>
<body>
<div id="reader" style="width: 100%; max-width: 600px; margin: auto;"></div>
<input type="text" id="barcodeResult" readonly style="width: 100%; margin-top: 10px; padding: 10px;">

<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Prikaz rezultata u input polju
        document.getElementById('barcodeResult').value = decodedText;

        // Opcionalno: slanje rezultata na server putem AJAX-a
        fetch('/api/scan-result', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ result: decodedText })
        })
            .then(response => response.json())
            .then(data => {
                console.log('Uspeh:', data);
            })
            .catch((error) => {
                console.error('Greška:', error);
            });
    }

    function onScanError(errorMessage) {
        // Obrada grešaka pri skeniranju
        console.error('Greška pri skeniranju:', errorMessage);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>


</body>
</html>
