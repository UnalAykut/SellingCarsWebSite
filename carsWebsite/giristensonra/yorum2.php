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
    <title>ARS | İNCELEMELER </title>

</head>
<body>
<?php
		// Veritabanı bağlantısı
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "carswebsite";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Bağlantı kontrolü
		if ($conn->connect_error) {
			die("Bağlantı hatası: " . $conn->connect_error);
		}

		// Eğer form gönderilmişse, yeni yorumu veritabanına ekleyin
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $adSoyad = $_POST["adSoyad"];
            $yorum = $_POST["yorum"];
            $rating = $_POST["rating"];
        
            // Yeni yorumu veritabanına ekleyin
            $stmt = $conn->prepare("INSERT INTO yorumlar2 (adSoyad, yorum, rating) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $adSoyad, $yorum, $rating);
            if ($stmt->execute()) {
                // Yorum ekleme işlemi başarılı oldu
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        Yorum başarıyla eklendi.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            } else {
                // Yorum ekleme işlemi başarısız oldu
                echo "Hata: " . $stmt->error;
            }
            $stmt->close();
        }
        
	?>
    
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

<section class="home" id="home">

</section>





<section class="reviews" id="reviews">
    <h1 class="heading">Kullanıcı <span>İncelemeleri</span></h1>
    <div class="swiper review-slider">
        <div class="swiper-wrapper">
            <?php
            // Veritabanından yorumları sorgula
            $sql2 = "SELECT * FROM yorumlar2";
            $result = $conn->query($sql2);

            // Yorumları sırayla göster
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='swiper-slide box'>";
                    echo "<img src='image/user.png' alt=''>";
                    echo "<div class='content'>";
                    echo "<h3 name='adSoyad'>" . $row["adSoyad"] . "</h3>";
                    echo "<p name='yorum'>" . $row["yorum"] . "</p>";
                    echo "<div class='stars' data-rating='" . $row["rating"] . "'></div>"; // Yıldız puanını göster
                    echo "</div>"; // content divini kapat
                    echo "</div>"; // swiper-slide divini kapat
                }
            } else {
                echo "<div class='swiper-slide box'>";
                echo "Henüz yorum yapılmamış.";
                echo "</div>";
            }

            $conn->close();
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Yıldız puanlarını dön ve her birine yıldızları ekle
        $('.stars').each(function() {
            var rating = $(this).data('rating'); // Yıldız puanını al
            var stars = '';

            // Yıldızları oluştur
            for (var i = 1; i <= 5; i++) {
                if (i <= rating) {
                    stars += '<i class="fas fa-star"></i>'; // Dolu yıldız
                } else {
                    stars += '<i class="far fa-star"></i>'; // Boş yıldız
                }
            }

            $(this).html(stars); // Yıldızları ekle
        });
    });
</script>






<section class="footer" id="footer">

    <div class="box-container">

        <div class="box">
            <h3>Şubelerimiz</h3>
            <a href="https://goo.gl/maps/ZJA3gpZY9qE6ETPk8"> <i class="fas fa-map-marker-alt"></i>Üsküdar </a> 
            <a href="https://goo.gl/maps/QjNdUZTjndjiHD5Z9"> <i class="fas fa-map-marker-alt"></i>Mersin </a>
            <a href="https://goo.gl/maps/kewYA9Qr6MvuqHB3A"> <i class="fas fa-map-marker-alt"></i>Trabzon </a>
            <a href="https://goo.gl/maps/yff8MfXFWtQ5qMc56"> <i class="fas fa-map-marker-alt"></i>Bursa </a>  
        </div>

        <div class="box">
            <h3>Hızlı Bağlantı</h3>
            <a href="index2.php"> <i class="fas fa-arrow-right"></i> Anasayfa </a>
            <a href="arabasat2.php"> <i class="fas fa-arrow-right"></i> Araçlar </a>
            <a href="yorum2.php"> <i class="fas fa-arrow-right"></i>İncelemeler </a>
            <a href="iletisim2.html"> <i class="fas fa-arrow-right"></i> İletişim </a>
            <a href="hakkimizda2.html"> <i class="fas fa-arrow-right"></i> Hakkımızda </a>
        </div>

        <div class="box">
            <h3>İletişim</h3>
            <a href="#"> <i class="fas fa-phone"></i> 05050505050 </a>
            <a href="#"> <i class="fas fa-envelope"></i> arsmotors@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Üsküdar, İstanbul - 34 </a>
        </div>

        <div class="box">
            <h3>Sosyal Medya</h3>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        </div>
    </div>

</section>



<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>