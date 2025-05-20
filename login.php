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

$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "message" => "Usuário ou senha inválidos."]);
}

$conn->close();
?>
