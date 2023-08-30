<?php
$server = "localhost";
$username = "10_Elang";
$password = "qooq";
$database = "210_Elang";

// Buat koneksi ke database
$conn = mysqli_connect($server, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['nama'];
    $umur = $_POST['umur'];
    $email = $_POST['email'];

    $query = "INSERT INTO tabeldata(`id`, `nama`, `umur`, `email`) VALUES (0, '$name', '$umur', '$email')";
    
    if (mysqli_query($conn, $query)) {
        echo "Data tersimpan";
    } else {
        echo "Data gagal tersimpan: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM tabeldata";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Data Tabel</h2>";
        echo "<table style='border-collapse: collapse; width: 50%; margin: 0 auto; border: 1px solid #dddddd;'>";
        echo "<tr>";
        echo "<th style='background-color: #f2f2f2; border: 1px solid #dddddd;'>Nama</th>";
        echo "<th style='background-color: #f2f2f2; border: 1px solid #dddddd;'>Umur</th>";
        echo "<th style='background-color: #f2f2f2; border: 1px solid #dddddd;'>Email</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td style='border: 1px solid #dddddd;'>" . $row['nama'] . "</td>";
            echo "<td style='border: 1px solid #dddddd;'>" . $row['umur'] . "</td>";
            echo "<td style='border: 1px solid #dddddd;'>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Tidak ada data yang cocok.";
    }
} else {
    echo "ERROR: Tidak dapat menjalankan query $sql. " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
