<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "stiki_hard_crew";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menyiapkan dan mengikat
$stmt = $conn->prepare("INSERT INTO orders (name, phone, size) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $phone, $size);

// Mengambil nilai dari form
$name = $_POST['name'];
$phone = $_POST['phone'];
$size = $_POST['size'];

// Menjalankan statement SQL
if ($stmt->execute()) {
    // Jika berhasil, arahkan ke halaman terima kasih
    header("Location: thankyou.php");
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
