<?php
$db = $_SESSION['db'];
$conn=mysqli_connect("localhost","root","12345678",$db);
mysqli_query($conn,"SET character_set_client=utf8");
mysqli_query($conn,"SET character_set_results=utf8");
mysqli_query($conn,"SET character_set_connection=utf8");
mysqli_query($conn,"SET character_set_database=utf8");
mysqli_query($conn,"SET character_set_server=utf8");
mysqli_query($conn,"set character_set_server='utf8'");
mysqli_query($conn,"set names= 'utf8'");

?>
<?php
$host = 'localhost';
$db = $_SESSION['db'];
$user = 'root';
$pass = '12345678';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<?php
$dsn2 = new PDO($dsn, $user, $pass);
//set come db attributes
$dsn2->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$dsn2->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$dsn2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>

