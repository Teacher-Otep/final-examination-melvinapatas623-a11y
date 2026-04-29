<?php
$host = '127.0.0.1'; 
$db   = 'melvin';  //sukatan yo dytoy jay nagan ti database yo
$user = 'root';        //
$pass = '';            //
$port = '3306';        //nu nagusar kayo sabali nga port sukatan yo metlang dytoy
$charset = 'utf8mb4';


$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);

} catch (\PDOException $e) {

     die("Connection failed: " . $e->getMessage());
}
?>