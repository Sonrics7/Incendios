<?php
header('Content-Type: application/json');

require("conexion.php");

$conexion = retornarConexion();

switch ($_GET['accion']) {
  case 'enviar':
        $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
        //$date = date('yyyy-mm-dd');
        $respuesta = mysqli_query($conexion, "insert into recuperar(correo,fechaEnvio) values ('$correo', NOW())");
        echo json_encode($respuesta);
        break;
  case 'agregar':
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombreR']);
    $apellidos = mysqli_real_escape_string($conexion, $_POST['apellidosR']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuarioR']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasenaR']);
    $cargo = mysqli_real_escape_string($conexion, $_POST['cargoR']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correoR']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefonoR']);
    $respuesta = mysqli_query($conexion, "insert into usuarios(usuario,contrasena,nombre,apellidos,cargo,correo,telefono) values ('$usuario','$contrasena','$nombre','$apellidos','$cargo','$correo','$telefono')");
    echo json_encode($respuesta);
    break;
  case 'existe':
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombrenuevo']);
    $respuesta = mysqli_query($conexion, "select nombre from usuarios where nombre='$nombre'");
    $cantidad = mysqli_num_rows($respuesta);
    if ($cantidad == 1)
      echo '{"resultado":"repetido"}';
    else
      echo '{"resultado":"norepetido"}';
    break;
}

?>