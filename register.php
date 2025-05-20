<?php
header('Content-Type: application/json');
$host = "localhost";
$db = "flutter_login";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die(json_encode(["success" => false, "message" => "Erro na conexão."]));
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";
if ($conn->query($sql) === TRUE) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "message" => "Erro ao registrar."]);
}

$conn->close();
?>
