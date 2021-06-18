<?php
$usuario = $_POST['username'];
$contraseña = $_POST['password'];
include('db.php');
$consulta = "SELECT*FROM users where  username='$usuario' and contra='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if ($filas) {
  if (isset($_COOKIE['id_User'])) {
    unset($_COOKIE['id_User']);
    setcookie('id_User', null, -1, '/');
  }
  setcookie("id_User", $usuario, time() + 3600, '/');
  header("location:../main/main.php");
} else {

  include("index.php")
?>
  <div id="error">
    <h1>Error de Autentificación</h1>
    <button type="submit"><a class="error" href="index.php">Intentar de nuevo</a></button>
  </div>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>