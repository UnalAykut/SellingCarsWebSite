<!DOCTYPE html>
<html>
<head>
    <title>Araba Düzenle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body{
            padding: 20px;   
        }
        label, .btn-primary{
            color: white;
        }
        input[type="text"]{
            color: black;
        }
        h2{
            color: #ffc107;
        }
    </style>
</head>
<body style="background-color: black">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Araba Düzenle</h2>
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

                // Form gönderildiğinde
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Güncellenecek veri alanlarını alın
                    $name = $_POST["name"];
                    $image= $_POST["image"];
                    $price = $_POST["price"];
                    $year = $_POST["year"];
                    $transmission = $_POST["transmission"];
                    $fuel = $_POST["fuel"];
                    $top_speed = $_POST["top_speed"];
                    $engine_displacement = $_POST["engine_displacement"];
                    $horsepower = $_POST["horsepower"];
                    $max_torque = $_POST["max_torque"];
                    $average_consumption = $_POST["average_consumption"];
                    $acceleration = $_POST["acceleration"];

                    // Veriyi güncelle
                    $sql = "UPDATE arabalar SET name='$name', image='$image', price='$price', year='$year', transmission='$transmission', fuel='$fuel', top_speed='$top_speed', engine_displacement='$engine_displacement', horsepower='$horsepower', max_torque='$max_torque', average_consumption='$average_consumption', acceleration='$acceleration' WHERE id='$id'";

                    if ($conn->query($sql) === TRUE) {
                        echo '<div class="alert alert-success" role="alert">Veri başarıyla güncellendi.</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Veri güncelleme hatası: ' . $conn->error . '</div>';
                    }
                }

                // Seçilen arabayı veritabanından al
                $sql = "SELECT * FROM arabalar WHERE id='$id'";
                $result = $conn->query($sql);

                // Araba verisi varsa, formu göster
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
                    <div class="form-group">
                        <label for="name">İsim:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Resim:</label>
                        <input type="text" class="form-control" name="image" value="<?php echo $row['image']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Fiyat:</label>
                        <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="year">Yıl:</label>
                        <input type="text" class="form-control" name="year" value="<?php echo $row['year']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="transmission">Vites:</label>
                        <input type="text" class="form-control" name="transmission" value="<?php echo $row['transmission']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fuel">Yakıt:</label>
                        <input type="text" class="form-control" name="fuel" value="<?php echo $row['fuel']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="top_speed">Max Hız:</label>
                        <input type="text" class="form-control" name="top_speed" value="<?php echo $row['top_speed']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="engine_displacement">Motor Hacmi:</label>
                        <input type="text" class="form-control" name="engine_displacement" value="<?php echo $row['engine_displacement']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="horsepower">Güç:</label>
                        <input type="text" class="form-control" name="horsepower" value="<?php echo $row['horsepower']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="max_torque">Tork:</label>
                        <input type="text" class="form-control" name="max_torque" value="<?php echo $row['max_torque']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="average_consumption">Ortalama Tüketim:</label>
                        <input type="text" class="form-control" name="average_consumption" value="<?php echo $row['average_consumption']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="acceleration">Hızlanma:</label>
                        <input type="text" class="form-control" name="acceleration" value="<?php echo $row['acceleration']; ?>">
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-warning">Güncelle</button>
                        <a href="admin.php" class="btn btn-warning" >Çıkış</a>
                    </div>
                </form>
                <?php
                } else {
                    echo "Araba bulunamadı.";
                }

                // Veritabanı bağlantısını kapat
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
