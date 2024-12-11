<?php
include 'connect.php';

try {
    $stmt = $pdo->query("SELECT * FROM users where  age > 23");

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['id']. " - ". $row['name']. " (".$row['age'].")"."<br>";
    }

} catch (PDOException $th) {
    echo "Hata: ".$th->getMessage();
}