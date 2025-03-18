<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Anggota Keluarga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #e0f7fa;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        button {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #cc0000;
        }
        input {
            padding: 10px;
            width: calc(100% - 22px);
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .stats {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Anggota Keluarga</h2>
        <ul id="familyList"></ul>
        
        <textarea id="manualInput" placeholder="Masukkan daftar nama, pisahkan dengan koma..." rows="3" style="width: 100%; margin-top: 10px;"></textarea>
        <button onclick="manualInput()" style="background:#28a745;">Tambah Manual</button>
        
        <p class="stats" id="stats"></p>
        <p class="stats" id="reverseName"></p>
        <p class="stats" id="vowelConsonant"></p>
    </div>
    
    <script>
        let familyMembers = [];
        
        function renderList() {
            const list = document.getElementById("familyList");
            list.innerHTML = "";
            familyMembers.forEach((name, index) => {
                list.innerHTML += `<li>${name} <button onclick="removeMember(${index})">Hapus</button></li>`;
            });
            updateStats();
        }

        function manualInput() {
            const names = document.getElementById("manualInput").value.split(",").map(name => name.trim()).filter(name => name !== "");
            if (names.length > 0) {
                familyMembers = names;
                renderList();
            }
        }

        function removeMember(index) {
            familyMembers.splice(index, 1);
            renderList();
        }
        
        function updateStats() {
            let totalWords = 0;
            let totalLetters = 0;
            let totalVowels = 0;
            let totalConsonants = 0;
            let allReversedNames = [];
            
            familyMembers.forEach(name => {
                totalWords += name.split(" ").length;
                totalLetters += name.replace(/\s/g, "").length;
                
                const vowels = name.match(/[aeiouAEIOU]/g) || [];
                const consonants = name.match(/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/g) || [];
                totalVowels += vowels.length;
                totalConsonants += consonants.length;
                
                allReversedNames.push(name.split("").reverse().join(""));
            });
            
            document.getElementById("stats").innerText = `Jumlah Kata: ${totalWords}, Jumlah Huruf: ${totalLetters}`;
            document.getElementById("reverseName").innerText = `Nama Terbalik: ${allReversedNames.join(", ")}`;
            document.getElementById("vowelConsonant").innerText = `Jumlah Vokal: ${totalVowels}, Jumlah Konsonan: ${totalConsonants}`;
        }
        
        renderList();
    </script>
</body>
</html>