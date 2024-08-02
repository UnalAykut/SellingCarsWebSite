<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Girdi doğrulaması
  $email = filter_input(INPUT_POST, 'login-email', FILTER_VALIDATE_EMAIL);
  $password = $_POST['login-password'];
  
  if (!$email) {
    echo "<script>alert('Lütfen geçerli bir e-mail adresi girin.');</script>";
    echo "<script>window.location.href='kayıtvelogin.html';</script>";
    exit();
  }
  
  // Veritabanına bağlan
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "arsmotors";

  // Bağlantıyı oluştur
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Bağlantıyı kontrol et
  if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
  }

  // E-mail adresi veritabanında var mı kontrol et (Prepared Statements kullanarak)
  $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $password_hash = $row["pasword"];
    // Girilen şifre hashlendi ve veritabanındaki hash ile karşılaştırıldı
    if (password_verify($password, $password_hash)) {
      session_start();
      $_SESSION["email"] = $email;
      echo "<script>alert('Giriş işlemi başarıyla tamamlandı.');</script>";
      echo "<meta http-equiv='refresh' content='0;url=../giristensonra/index2.html'>";
      
    } else {
      echo "<script>alert('Hatalı e-mail veya şifre');</script>";
      echo "<script>window.location.href='kayıtvelogin.html';</script>";
      exit();
    }
  } else {
    echo "<script>alert('Hatalı e-mail veya şifre');</script>";
    echo "<script>window.location.href='kayıtvelogin.html';</script>";
    exit();
  }
  
  // Bağlantıyı kapat
  $stmt->close();
  $conn->close();
}
?>