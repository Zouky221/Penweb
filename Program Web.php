<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengolah Nama Keluarga</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 20px; }
        input { padding: 8px; margin: 10px; }
        button { padding: 8px 12px; cursor: pointer; }
        .result { margin-top: 15px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Pengolah Nama Keluarga</h2>
    <input type="text" id="nameInput" placeholder="Masukkan nama" />
    <button onclick="processName()">Proses</button>
    <div class="result" id="output"></div>

    <script>
        function processName() {
            const name = document.getElementById("nameInput").value.trim();
            if (name === "") {
                document.getElementById("output").innerHTML = "Masukkan nama terlebih dahulu!";
                return;
            }
            
            const words = name.split(" ");
            const charCount = name.replace(/\s+/g, '').length;
            const reversedName = name.split("").reverse().join("");
            
            const vowels = "aeiouAEIOU";
            let vowelCount = 0;
            let consonantCount = 0;
            
            for (let char of name.replace(/\s+/g, '')) {
                if (vowels.includes(char)) {
                    vowelCount++;
                } else {
                    consonantCount++;
                }
            }
            
            document.getElementById("output").innerHTML = `
                <p>Jumlah kata: ${words.length}</p>
                <p>Jumlah huruf: ${charCount}</p>
                <p>Nama terbalik: ${reversedName}</p>
                <p>Jumlah vokal: ${vowelCount}</p>
                <p>Jumlah konsonan: ${consonantCount}</p>
            `;
        }
    </script>
</body>
</html>