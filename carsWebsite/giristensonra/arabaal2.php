<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carswebsite";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}

// Araba verisini al
if (isset($_GET['car_id'])) {
    $carId = $_GET['car_id'];
    $stmt = $conn->prepare("SELECT * FROM arabalar WHERE id = :carId");
    $stmt->bindParam(':carId', $carId);
    $stmt->execute();
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <script src="//code.jivosite.com/widget/fXX8eeInXy" async></script>
    <title>ArsM | ARAÇ DETAY </title>
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

    <section class="contact" id="contact">
        <br><br><br><br><br><br><br><br><br><br>
        <h1 class="heading">ARAÇ<span> DETAYLARI</span></h1>
        <div class="row">
            <form action="" style="width: 100%">
                <h3></h3>
                
                <img src="../image/<?php echo $car['image']; ?>" alt="Araba Resmi">

                <div class="content" >
                    <br>
                    <h3><?php echo $car['name']; ?></h3>
                    <div class="price" style="color:white;font-size: medium;">
                        <span>Fiyat : </span> <?php echo $car['price']; ?>
                    </div>
                    <p style="color: white; font-size: 10px;"> 
                        <span class="fas fa-circle" style="font-size: medium;"></span> <?php echo $car['year']; ?>
                        <span class="fas fa-circle"></span> <?php echo $car['transmission']; ?>
                        <span class="fas fa-circle"></span> <?php echo $car['fuel']; ?>
                        <span class="fas fa-circle"></span> <?php echo $car['top_speed'];?>
                        <span class="fas fa-circle"></span> <?php echo $car['engine_displacement'];?>
                        <span class="fas fa-circle"></span> <?php echo $car['horsepower'];?>
                        <span class="fas fa-circle"></span> <?php echo $car['max_torque'];?>
                        <span class="fas fa-circle"></span> <?php echo $car['average_consumption'];?>
                        <span class="fas fa-circle"></span> <?php echo $car['acceleration'];?>
                        
                    </p>
                    <br>
                </div>
                <br>
            </form>
            <form action="">
                <h3>ARAÇ ÖZELLİKLERİ</h3>
                <div class="content" style="margin-left: 50px;"> 
                    <ul> 
                        <li style="font-size: medium;"><b>Vites Tipi:</b> <?php echo $car['transmission']; ?> </li><br><br>   
                        <li style="font-size: medium;"><b>Yakıt Türü:</b> <?php echo $car['fuel']; ?></li><br><br>
                        <li style="font-size: medium;"><b>Maksimum Hız:</b> <?php echo $car['top_speed']; ?></li> <br><br>
                        <li style="font-size: medium;"><b>Silindir Hacmi:</b> <?php echo $car['engine_displacement']; ?> </li><br><br>   
                        <li style="font-size: medium;"><b>Beygir Gücü:</b> <?php echo $car['horsepower']; ?></li><br><br>
                        <li style="font-size: medium;"><b>Maksimum Tork:</b> <?php echo $car['max_torque']; ?></li> <br><br>
                        <li style="font-size: medium;"><b>Ortalama Tüketim:</b> <?php echo $car['average_consumption']; ?> </li><br><br>   
                        <li style="font-size: medium;"><b>0-100 Km Hızlanma:</b> <?php echo $car['acceleration']; ?></li><br><br>
                    </ul>
                </div>
                <a href="satinalma.html" class="btn">Satın Al</a>
            </div>
            <br>
        </form>
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
