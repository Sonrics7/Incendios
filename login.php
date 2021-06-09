<?php
require("conexion.php");

$conexion = retornarConexion();

$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
$respuesta = mysqli_query($conexion, "select usuario, contrasena from usuarios where usuario='$usuario' and contrasena='$contrasena'");
if (mysqli_num_rows($respuesta) == 1) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    echo "correcta";
} else {
    echo "incorrecta";
}
?>