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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Paneli</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Admin Paneli</h2>
    <table>
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
            <th>Favori</th>
            <th>İşlemler</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Verileri döngüyle tabloya ekle
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td><img src='image/" . $row["image"] . "' width='100'></td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["year"] . "</td>";
                echo "<td>" . $row["transmission"] . "</td>";
                echo "<td>" . $row["fuel"] . "</td>";
                echo "<td>" . $row["top_speed"] . "</td>";
                echo "<td>" . $row["engine_displacement"] . "</td>";
                echo "<td>" . $row["horsepower"] . "</td>";
                echo "<td>" . $row["max_torque"] . "</td>";
                echo "<td>" . $row["average_consumption"] . "</td>";
                echo "<td>" . $row["acceleration"] . "</td>";
                echo "<td>" . ($row["is_favorite"] ? "Evet" : "Hayır") . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row["id"] . "'>Düzenle</a> |
                        <a href='delete.php?id=" . $row["id"] . "'>Sil</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='14'>Veri bulunamadı.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Veritabanı bağlantısını kapat
$conn->close();
?>
