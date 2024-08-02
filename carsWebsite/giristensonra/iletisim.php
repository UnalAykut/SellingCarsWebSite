<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carswebsite";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

// Form verilerini al
$adsoyad = $_POST['adsoyad'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$ileti = $_POST['ileti'];

// Veritabanına ekleme sorgusu
$sql = "INSERT INTO iletisim (adsoyad, email, telefon, ileti) VALUES ('$adsoyad', '$email', '$telefon', '$ileti')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Mesajınız Başarıyla Gönderildi"); window.location.href = "iletisim2.html";</script>';


} else {
    echo '<script>alert("MESAJ GÖNDERİLİRKEN BİR SORUN OLUŞTU: ' . $conn->error . '"); window.location.href = "iletisim2.html";</script>';
}

// Veritabanı bağlantısını kapat
$conn->close();
?>