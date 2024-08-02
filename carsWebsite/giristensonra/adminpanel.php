<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .sidebar {
            width: 15%;
            height: 100%;
        }

        .table {
            position: absolute;
            left: 15%;
            width: 85%;
            margin-top: 50px;
        }

        .ri-menu-line {
            display: none;
        }

        .hidden {
            display: none;
        }

        .extreme {
            display: none;
        }

        .extreme2 {
            display: none;
        }

        
        .add-button {
        position:absolute;
        left:15%;
        width:100%;
        }

        .add-button .btn {
            width: 85%;

        }
        
     
    </style>
</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>ARS<span style="color: rgb(220, 176, 0);">|MOTORS</span></h2>
        </div>
        <div class="search--notification--profile">
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#content" onclick="toggleContent()">
                        <span class="sidebar--item">Kullanıcı Mesajları</span>
                    </a>
                </li>
                <li>
                    <a href="#content2" onclick="toggleContent2()">
                        <span class="sidebar--item">Araba Ekle-Güncelleme</span>
                    </a>
                </li>
                <li>
                    <a href="#content3" onclick="toggleContent3()">
                        <span class="sidebar--item" style="white-space: nowrap;">Motor Ekle-Güncelleme</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidebar--item" onclick="toggleContent4()">Yorumları Düzenle</span>
                    </a>
                </li>
                <li>
            </ul>
            <ul class="sidebar--bottom-items">
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
</li>
            </ul>
        </div>

        <div class="content hidden">
            <?php
            // Veritabanı bağlantısı ve diğer gerekli işlemler
            // Verileri veritabanından çekme
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "carswebsite";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM iletisim";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>E-Mail</th>
                                <th>Telefon</th>
                                <th>İleti</th>
                            </tr>
                        </thead>
                        <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['adSoyad'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['telefon'] . '</td>
                            <td>' . $row['ileti'] . '</td>
                        </tr>';
                }

                echo '</tbody>
                    </table>';
            } else {
                echo 'Kayıtlı mesaj bulunamadı.';
            }

            // Veritabanı bağlantısını kapatma
            $conn->close();
            ?>
        </div>

        <div class="content2 extreme">
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

            // Araba verilerini veritabanından al
            $sql = "SELECT * FROM arabalar";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Resim</th>
                                <th>İsim</th>
                                <th>Fiyat</th>
                                <th>Yıl</th>
                                <th>Vites</th>
                                <th>Yakıt</th>
                                <th>Max Hız</th>
                                <th>Motor Hacmi</th>
                                <th>Güç</th>
                                <th>Tork</th>
                                <th>Ortalama Tüketim</th>
                                <th>Hızlanma</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['id'] . '</td>
                            <td><img src="image/' . $row["image"] . '" width="100"></td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['year'] . '</td>
                            <td>' . $row['transmission'] . '</td>
                            <td>' . $row['fuel'] . '</td>
                            <td>' . $row['top_speed'] . '</td>
                            <td>' . $row['engine_displacement'] . '</td>
                            <td>' . $row['horsepower'] . '</td>
                            <td>' . $row['max_torque'] . '</td>
                            <td>' . $row['average_consumption'] . '</td>
                            <td>' . $row['acceleration'] . '</td>
                            <td>
                                <a href="edit.php?id=' . $row['id'] . '">Düzenle</a> |
                                <a href="delete.php?id=' . $row['id'] . '">Sil</a>
                            </td>
                        </tr>';
                }
                echo '</tbody>
                    </table>';
            } else {
                echo "<p>Veri bulunamadı.</p>";
            }

            // Veritabanı bağlantısını kapat
            $conn->close();
            ?>
            <div class="add-button">
                <a href="add.php" class="btn btn-primary btn-lg">Ekle</a>
            </div>
        </div>

        <div class="content3 extreme2">
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

            // Motor verilerini veritabanından al
            $sql = "SELECT * FROM motorlar";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Resim</th>
                                <th>İsim</th>
                                <th>Fiyat</th>
                                <th>Yıl</th>
                                <th>Vites</th>
                                <th>Yakıt</th>
                                <th>Max Hız</th>
                                <th>Motor Hacmi</th>
                                <th>Güç</th>
                                <th>Tork</th>
                                <th>Ortalama Tüketim</th>
                                <th>Hızlanma</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row['id'] . '</td>
                            <td><img src="image/' . $row["image"] . '" width="100"></td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['year'] . '</td>
                            <td>' . $row['transmission'] . '</td>
                            <td>' . $row['fuel'] . '</td>
                            <td>' . $row['top_speed'] . '</td>
                            <td>' . $row['engine_displacement'] . '</td>
                            <td>' . $row['horsepower'] . '</td>
                            <td>' . $row['max_torque'] . '</td>
                            <td>' . $row['average_consumption'] . '</td>
                            <td>' . $row['acceleration'] . '</td>
                            <td>
                                <a href="edit.php?id=' . $row['id'] . '">Düzenle</a> |
                                <a href="delete.php?id=' . $row['id'] . '">Sil</a>
                            </td>
                        </tr>';
                }
                echo '</tbody>
                    </table>';
            } else {
                echo "<p>Veri bulunamadı.</p>";
            }

            // Veritabanı bağlantısını kapat
            $conn->close();
            ?>
            <div class="add-button">
                <a href="add.php" class="btn btn-primary btn-lg">Ekle</a>
            </div>
        </div>


        <div class="content4 extreme3">
        <?php if (!empty($successMessage)): ?>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <?php echo $successMessage; ?>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>
<?php endif; ?>
         <?php
        // Veritabanı bağlantısı ve diğer gerekli işlemler

     // Verileri veritabanından çekme
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carswebsite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM yorumlar2";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>Yorum</th>
                        <th>Değerlendirme</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['adSoyad'] . '</td>
                    <td>' . $row['yorum'] . '</td>
                    <td>' . $row['rating'] . '</td>
                    <td>
                        <a href="yorumedit.php?id=' . $row['id'] . '">Sil</a>
                    </td>
                </tr>';
        }
        echo '</tbody>
            </table>';
    } else {
        echo 'Kayıtlı yorum bulunamadı.';
    }
    
    // Veritabanı bağlantısını kapatma
    $conn->close();
    ?>
    </div>
</div>
      
    </section>

    <script>
        function toggleContent() {
            var content = document.querySelector('.content');
            content.classList.toggle('hidden');
        }

        function toggleContent2() {
            var content = document.querySelector('.content2');
            content.classList.toggle('extreme');
        }

        function toggleContent3() {
            var content = document.querySelector('.content3');
            content.classList.toggle('extreme2');
        }
        function toggleContent4() {
            var content = document.querySelector('.content4');
            content.classList.toggle('extreme3');
        }
    </script>

    <script src="js/admin.js"></script>
</body>

</html>