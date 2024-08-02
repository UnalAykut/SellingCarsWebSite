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
if (isset($_GET['motor_id'])) {
    $motorId = $_GET['motor_id'];
    $stmt = $conn->prepare("SELECT * FROM motorlar WHERE id = :motorId");
    $stmt->bindParam(':motorId', $motorId);
    $stmt->execute();
    $motor = $stmt->fetch(PDO::FETCH_ASSOC);
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
    
        <a href="index.php" class="logo"> <span style="font-size: 30px;">ARS</span> | Motors </a>
    
        <nav class="navbar">
            <ul>
                <li class="">
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

    <section class="contact" id="contact">
        <br><br><br><br><br><br><br><br><br><br>
        <h1 class="heading">ARAÇ<span> DETAYLARI</span></h1>
        <div class="row">
            <form action="" style="width: 100%">
                <h3></h3>
                
                <img src="image/<?php echo $motor['image']; ?>" alt="Motor Resmi">

                <div class="content" >
                    <br>
                    <h3><?php echo $motor['name']; ?></h3>
                    <div class="price" style="color:white;font-size: medium;">
                        <span>Fiyat : </span> <?php echo $motor['price']; ?> 
                    </div>
                    <p style="color: white; font-size: 10px;"> 
                        <span class="fas fa-circle" style="font-size: medium;"></span> <?php echo $motor['year']; ?>
                        <span class="fas fa-circle"></span> <?php echo $motor['transmission']; ?>
                        <span class="fas fa-circle"></span> <?php echo $motor['fuel']; ?>
                        <span class="fas fa-circle"></span> <?php echo $motor['top_speed'];?>
                        <span class="fas fa-circle"></span> <?php echo $motor['engine_displacement'];?>
                        <span class="fas fa-circle"></span> <?php echo $motor['horsepower'];?>
                        <span class="fas fa-circle"></span> <?php echo $motor['max_torque'];?>
                        <span class="fas fa-circle"></span> <?php echo $motor['average_consumption'];?>
                        <span class="fas fa-circle"></span> <?php echo $motor['acceleration'];?>
                        
                    </p>
                    <br>
                </div>
                <br>
            </form>
            <form action="">
                <h3>ARAÇ ÖZELLİKLERİ</h3>
                <div class="content" style="margin-left: 50px;"> 
                    <ul> 
                        <li style="font-size: medium;"><b>Vites Tipi:</b> <?php echo $motor['transmission']; ?> </li><br><br>   
                        <li style="font-size: medium;"><b>Yakıt Türü:</b> <?php echo $motor['fuel']; ?></li><br><br>
                        <li style="font-size: medium;"><b>Maksimum Hız:</b> <?php echo $motor['top_speed']; ?></li> <br><br>
                        <li style="font-size: medium;"><b>Silindir Hacmi:</b> <?php echo $motor['engine_displacement']; ?> </li><br><br>   
                        <li style="font-size: medium;"><b>Beygir Gücü:</b> <?php echo $motor['horsepower']; ?></li><br><br>
                        <li style="font-size: medium;"><b>Maksimum Tork:</b> <?php echo $motor['max_torque']; ?></li> <br><br>
                        <li style="font-size: medium;"><b>Ortalama Tüketim:</b> <?php echo $motor['average_consumption']; ?> </li><br><br>   
                        <li style="font-size: medium;"><b>0-100 Km Hızlanma:</b> <?php echo $motor['acceleration']; ?></li><br><br>
                    </ul>
                </div>
                <a href="kayıtol/kayıtvelogin.html" class="btn">Opsiyonları Belirle</a>
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
</body>
</html>
