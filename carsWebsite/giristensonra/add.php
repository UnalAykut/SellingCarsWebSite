<?php
// Veritabanına bağlantıyı sağlayan bilgileri belirtin
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carswebsite";

// Formdan gelen verileri al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $image = $_POST["image"];
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
    
    

    // Veritabanına araç eklemek için SQL sorgusu
    $sql = "INSERT INTO arabalar (name, price, year, transmission, fuel, top_speed, engine_displacement, horsepower, max_torque, average_consumption, acceleration, is_favorite, image) 
            VALUES ('$name', '$price', '$year', '$transmission', '$fuel', '$top_speed', '$engine_displacement', '$horsepower', '$max_torque', '$average_consumption', '$acceleration', '$is_favorite', '$image')";

    // Veritabanı bağlantısını oluşturun
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Veritabanı bağlantısını kontrol edin
    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    // Sorguyu çalıştırın ve aracı ekleyin
    if ($conn->query($sql) === TRUE) {
        // Resim yükleme işlemi
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        
        // Anasayfaya yönlendir
        header("Location: index.php");
        exit();
    } else {
        echo "Araç eklenirken hata oluştu: " . $conn->error;
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Araç Ekle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body{
            padding: 20px;
            background-color: black;
        }
        label, .btn-warning{
            color: white;
        }
        input[type="text"]{
            color: black;
        }
        h2{
            color: #ffc107;
        }
        .container{
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Araç Ekle</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>İsim:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Fiyat:</label>
                <input type="text" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Yıl:</label>
                <input type="number" name="year" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Vites:</label>
                <input type="text" name="transmission" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Yakıt:</label>
                <input type="text" name="fuel" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Max Hız:</label>
                <input type="text" name="top_speed" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Motor Hacmi:</label>
                <input type="text" name="engine_displacement" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Güç:</label>
                <input type="text" name="horsepower" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tork:</label>
                <input type="text" name="max_torque" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ortalama Tüketim:</label>
                <input type="text" name="average_consumption" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Hızlanma:</label>
                <input type="text" name="acceleration" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Resim:</label>
                <input type="text" name="image" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning">Ekle</button>
            </div>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
