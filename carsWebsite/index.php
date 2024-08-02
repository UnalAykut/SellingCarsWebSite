<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/faviconformak.png">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    <link rel="stylesheet" href="css/style.css">
    <title>ARS | Motors </title>

</head>
<body>
    
<header class="header" style="background-color:#181818;">

    <div id="menu-btn" class="fas fa-bars"></div>
    
    <a href="index.php" class="logo" > <span style="font-size: 30px;">ARS</span> | Motors </a>

    <nav class="navbar">
        <ul>
        <li class="active">
        <a href="index.php">Anasayfa</a>
        </li>
        <li class="dropdown">
        <a href="" class="">Araçlar</a>
        <div class="dropdown-content">
        <a href="arabasat.php">Araba</a> 
        <a href="motorsat.php">Motosiklet</a> 
        </div>
        </li>
            
          <li><a href="yorum1.php">İncelemeler</a></li>
          <li><a href="iletisim.html">İletişim</a></li>
          
          
        </ul>
    </nav>
    <div id="login-btn">
        <button class="btn" onclick="window.location.href='kayıtol/kayıtvelogin.html';">Bize Katıl</button>
        
    </div>

    

</header> 
    
<div class="login-form-container">
    

    <span id="close-login-form" class="fas fa-times"></span>

    

</div>

<section class="home" id="home">

    <h3  class="" >Aradığın Araç Burada</h3>

    <img data-speed="5" class="" src="image/homeicopmg.png" alt="">
    <br><br><br><br>

    
</section>



<section class="vehicles" id="vehicles">

    <h1 class="heading"> Popüler <span>Araçlar</span> </h1>

    <div class="swiper vehicles-slider">
    <div class="swiper-wrapper">
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
        $sql = "SELECT id, image, name, price, year, transmission, fuel, top_speed FROM arabalar";

        // Sorguyu çalıştırın ve sonucu alın
        $result = $conn->query($sql);

        // Sonuçta en az 1 satır varsa
        if ($result->num_rows > 0) {
            // Her satır için verileri alın ve ekrana yazdırın
            while ($row = $result->fetch_assoc()) {
                echo '<div class="swiper-slide box">';
                echo '<img src="image/' . $row["image"] . '" alt="' . $row["name"] . '" class="araba-image">';
                echo '<div class="content">';
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<div class="price"><span>Fiyat : </span>' . $row["price"] . '</div>';
                echo '<p>';
                echo '<span class="fas fa-circle"></span> ' . $row["year"];
                echo '<span class="fas fa-circle"></span> ' . $row["transmission"];
                echo '<span class="fas fa-circle"></span> ' . $row["fuel"];
                echo '<span class="fas fa-circle"></span> ' . $row["top_speed"];
                echo '</p>';
                echo '<a href="arabaal.php?car_id=' . $row["id"] . '" onclick="window.location.href=\'arabaal.php\';" class="btn">Satın Al</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Veritabanında hiç kayıt bulunamadı.";
        }

        // Veritabanı bağlantısını kapatın
        $conn->close();
        ?>
    </div>
</div>


            

        <div class="swiper-pagination"></div>

    </div>

</section>

<section class="services" id="services">

    
    <div class="box-container">

        <video class="carvideo" src="video/car.mp4" autoplay loop playsinline muted></video>

    </div>

</section>

<section class="vehicles" id="vehicles">

    <h1 class="heading"> Popüler <span>Motorlar</span> </h1>

    <div class="swiper vehicles-slider">
    <div class="swiper-wrapper">
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
        $sql = "SELECT id, image, name, price, year, transmission, fuel, top_speed FROM motorlar";

        // Sorguyu çalıştırın ve sonucu alın
        $result = $conn->query($sql);

        // Sonuçta en az 1 satır varsa
        if ($result->num_rows > 0) {
            // Her satır için verileri alın ve ekrana yazdırın
            while ($row = $result->fetch_assoc()) {
                echo '<div class="swiper-slide box">';
                echo '<img src="image/' . $row["image"] . '" alt="' . $row["name"] . '" class="araba-image">';
                echo '<div class="content">';
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<div class="price"><span>Fiyat : </span>' . $row["price"] . '</div>';
                echo '<p>';
                echo '<span class="fas fa-circle"></span> ' . $row["year"];
                echo '<span class="fas fa-circle"></span> ' . $row["transmission"];
                echo '<span class="fas fa-circle"></span> ' . $row["fuel"];
                echo '<span class="fas fa-circle"></span> ' . $row["top_speed"];
                echo '</p>';
                echo '<a href="motoral.php?motor_id=' . $row["id"] . '" onclick="window.location.href=\'motoral.php\';" class="btn">Satın Al</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Veritabanında hiç kayıt bulunamadı.";
        }

        // Veritabanı bağlantısını kapatın
        $conn->close();
        ?>
    </div>
</div>
    </div>

</section>

<section class="services" id="services">

    <div class="box-container">
        <video class="carvideo" src="video/motorbike.mp4" preload  autoplay muted loop >

        </video>
    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="heading"> Kullanıcı <span>İncelemeleri</span> </h1>

    <div class="swiper review-slider">
        <div class="swiper-wrapper">
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
            // Veritabanından yorumları sorgula
            $sql2 = "SELECT * FROM yorumlar";
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
            <a href="index.php"> <i class="fas fa-arrow-right"></i> Anasayfa </a>
            <a href="arabasat.php"> <i class="fas fa-arrow-right"></i> Araçlar </a>
            <a href="yorum1.php"> <i class="fas fa-arrow-right"></i>İncelemeler </a>
            <a href="iletisim.html"> <i class="fas fa-arrow-right"></i> İletişim </a>
            <a href="hakkimizda1.html"> <i class="fas fa-arrow-right"></i> Hakkımızda </a>
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
<script>
  // Yıldızları etkinleştir
  const stars = document.querySelectorAll('.stars');
  stars.forEach(star => {
    const rating = parseFloat(star.dataset.rating);
    const fullStar = '<i class="fas fa-star"></i>';
    const halfStar = '<i class="fas fa-star-half-alt"></i>';
    const emptyStar = '<i class="far fa-star"></i>';

    let starsHTML = '';

    for (let i = 1; i <= 5; i++) {
      if (i <= rating) {
        starsHTML += fullStar;
      } else if (i - rating <= 0.5) {
        starsHTML += halfStar;
      } else {
        starsHTML += emptyStar;
      }
    }

    star.innerHTML = starsHTML;
  });
</script>



</body>
</html>