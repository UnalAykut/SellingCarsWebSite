<?php
// Favori ekleme veya silme işlemini gerçekleştiren kod
if (isset($_POST['car_id']) && isset($_POST['is_favorite'])) {
    $carId = $_POST['car_id'];
    $isFavorite = $_POST['is_favorite'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carswebsite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    if ($isFavorite == "false") {
        // Favoriye eklemek için kontrol et ve ardından ekle veya güncelle
        $checkQuery = "SELECT * FROM favoriler WHERE id = '$carId'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows == 0) {
            $insertQuery = "INSERT INTO favoriler (id, image, name, price, year, transmission, fuel, top_speed) 
                            SELECT id, image, name, price, year, transmission, fuel, top_speed 
                            FROM arabalar 
                            WHERE id = '$carId'";

            if ($conn->query($insertQuery) === true) {
                echo "Araba favorilere eklendi.";
            } else {
                echo "Hata: " . $conn->error;
            }
        } else {
            echo "Araba zaten favorilere ekli.";
        }
    } else {
        // Favorilerden sil
        $deleteQuery = "DELETE FROM favoriler WHERE id = '$carId'";
        if ($conn->query($deleteQuery) === true) {
            echo "Araba favorilerden silindi.";
        } else {
            echo "Hata: " . $conn->error;
        }
    }

    $conn->close();
    exit(); // İşlem tamamlandıktan sonra kodun devamını çalıştırmamak için çıkış yapılıyor
}
?>






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
    <title>ArsM | MOTORLAR</title>
    <style>
        .araba-image {
            width: 70%;
            height: auto;
        }
    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<Script>
$(document).ready(function() {
    $('.star').on('click', function() {
        var carId = $(this).attr('data-car-id');
        var isFavorite = $(this).prop('checked'); // Durumu tersine çevir

        $.ajax({
            type: 'POST',
            url: 'arabasat2.php',
            data: {
                car_id: carId,
                is_favorite: isFavorite
            },
            success: function(response) {
                console.log(response);
            }
        });
    });

    // Yıldız butonlarını işaretlenmemiş olarak ayarla
    $('.star').each(function() {
        $(this).prop('checked', 'true'); // Değer olarak 'true' kullan
    });
});

</Script>
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
                <a href="kulyorum.html">Yorum</a>
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
    <h1 class="heading"><span>Arabalar</span> </h1>
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
        $sql = "SELECT id, image, name, price, year, transmission, fuel, top_speed, is_favorite FROM arabalar";

// Sorguyu çalıştırın ve sonucu alın
$result = $conn->query($sql);

// Sonuçta en az 1 satır varsa
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $isFavorite = $row['is_favorite'] == 0 ? 'checked=' : ''; // Favori durumuna göre işaretlemeyi belirle
        echo '
        <div class="box">
            <div class="starbox">
                <input id="star' . $row['id'] . '" class="star" type="checkbox" title="bookmark page" data-car-id="' . $row['id'] . '">

                <label for="star' . $row['id'] . '" title="Amazing"></label>
            </div>
                    <img src="image/' . $row["image"] . '" alt="' . $row["name"] . '" class="araba-image">
                    <h3>' . $row["name"] . '</h3>
                    <div class="price"><span>Fiyat : </span>' . $row["price"] . '</div>
                    <p>
                        <span class="fas fa-circle"></span> ' . $row["year"] . '
                        <span class="fas fa-circle"></span> ' . $row["transmission"] . '
                        <span class="fas fa-circle"></span> ' . $row["fuel"] . '
                        <span class="fas fa-circle"></span> ' . $row["top_speed"] . '
                    </p>
                    <a href="arabaal2.php?car_id=' . $row["id"] . '" class="btn">Satın Al</a>
                </div>';
            }
        } else {
            echo "Veritabanında hiç kayıt bulunamadı.";
        }
        
        // Veritabanı bağlantısını kapat
        $conn->close();
        ?>

    </div>
</section>

<!-- ... -->

</body>

</html>
