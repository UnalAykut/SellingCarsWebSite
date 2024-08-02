<?php
// Veritabanına bağlantıyı sağlayan bilgileri belirtin
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carswebsite";

// Veritabanı bağlantısını oluşturun
$conn = new mysqli($servername, $username, $password, $dbname);

// Veritabanı bağlantısını kontrol edin
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// ID'yi alın
$id = $_GET['id'];

// Silinecek arabayı veritabanından kaldır
$sql = "DELETE FROM motorlar WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    // Araba başarıyla silindi, JavaScript ile bir alert mesajı göster
    echo '<script>alert("Motorsiklet başarıyla silindi."); window.location.href = "admin.php";</script>';
} else {
    // Araba silme hatası, JavaScript ile bir alert mesajı göster
    echo '<script>alert("Motorsiklet silme hatası: ' . $conn->error . '"); window.location.href = "admin.php";</script>';
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
