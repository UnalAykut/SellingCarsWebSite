<?php
// Veritabanı bağlantısı ve diğer gerekli işlemler

// Verileri veritabanından çekme
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carswebsite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

// Yorumu silme işlemi
$successMessage = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Yorumu veritabanından sil
    $stmt = $conn->prepare("DELETE FROM yorumlar2 WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Yorum silme işlemi başarılı oldu
        $successMessage = "Yorum başarıyla silindi.";
    } else {
        // Yorum silme işlemi başarısız oldu
        echo "Hata: " . $stmt->error;
    }
    $stmt->close();
}
?>