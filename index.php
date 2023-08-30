<!DOCTYPE html>
<html>
<head>
    <title>Formulir Input</title>
</head>
<body>
    <h2>Formulir Input</h2>
    <form action="proses.php" method="post">
        <label for="nama">Nama:</label> <br>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="umur">Umur:</label><br>
        <input type="number" id="umur" name="umur" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>
