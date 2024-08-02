<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <title>ArsM | Favoriler</title>
    <style>
        .araba-image {
            width: 70%;
            height: auto;
        }
    </style>


</head>

<body>

<header class="header" style="background-color:#181818;">

<div id="menu-btn" class="fas fa-bars"></div>

<a href="index2.php" class="logo"> <span style="font-size: 30px;">ARS</span> | Motors </a>

<nav class="navbar">
    <ul>
        <li class="dropdown">
            <a href="" class="">Hesabım</a>
            <div class="dropdown-content">
            <a href="kullanıcıayar.html">Kullanıcı Ayarları</a> 
            <a href="siparistakip.html">Aktif Sipariş</a>
            <a href="favoriler.php">Favoriler</a> 
            <a href="yorum2.php">Yorum</a>
            <a href="../index.php">Çıkış Yap</a>  
            </div>
        </li>
    <li class="active">
    <a href="index2.php">Anasayfa</a>
    </li>
    <li class="dropdown">
    <a href="" class="">Araçlar</a>
    <div class="dropdown-content">
    <a href="arabasat2.php">Araba</a> 
    <a href="motorsat2.php">Motosiklet</a> 
    </div>
    </li>
       
    <li><a href="yorum2.php">İncelemeler</a></li>
    <li><a href="iletisim2.html">İletişim</a></li>
    
    </ul>
</nav>

<div id="login-btn" >
     
</div>


</header> 

<div class="login-form-container">


<span id="close-login-form" class="fas fa-times"></span>



</div>

    <section class="services" id="services">
        <br><br><br><br><br><br><br><br>
        <h1 class="heading"><span>Favoriler</span> </h1>

        <div class="box-container">

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

// Veritabanından verileri çekmek için SQL sorgusu
$sql = "SELECT id, image, name, price, year, transmission, fuel, top_speed FROM favoriler";

// Sorguyu çalıştırın ve sonucu alın
$result = $conn->query($sql);

// Sonuçta en az 1 satır varsa
if ($result->num_rows > 0) {
    // Her satır için verileri alın ve ekrana yazdırın
    while ($row = $result->fetch_assoc()) {
        $carId = null;
        $motorId = null;

        if ($row["id"] > 49) {
            $motorId = $row["id"];
        } else {
            $carId = $row["id"];
        }

        echo "<div class='box'>";
        echo "<img src='image/" . $row["image"] . "' alt='" . $row["name"] . "' class='araba-image'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<div class='price'><span>Fiyat : </span>" . $row["price"] . "</div>";
        echo "<p>";
        echo "<span class='fas fa-circle'></span> " . $row["year"];
        echo "<span class='fas fa-circle'></span> " . $row["transmission"];
        echo "<span class='fas fa-circle'></span> " . $row["fuel"];
        echo "<span class='fas fa-circle'></span> " . $row["top_speed"];
        echo "</p>";

        if ($motorId !== null && $motorId !== '') {
            echo "<a href='motoral2.php?motor_id=" . $motorId . "' class='btn'>Satın Al</a>";
        } else if ($carId !== null && $carId !== '') {
            echo "<a href='arabaal2.php?car_id=" . $carId . "' class='btn'>Satın Al</a>";
        }

        echo "</div>";
    }
} else {
    echo "<div class='box'>";
    echo "  <h2>Favorilerinize araç eklemediniz.</h2>";
    echo "</div>";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>


<script>
    function satinal(motorId, carId) {
    if (motorId !== null && motorId !== '') {
        window.location.assign("motoral2.php?motor_id=" + motorId);
    } else if (carId !== null && carId !== '') {
        window.location.assign("arabaal2.php?car_id=" + carId);
    }
    return false;
}
</script>



    </section>

    <!-- ... -->

</body>

</html>
