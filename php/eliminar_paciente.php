<?php
include("conexion.php");
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];
if(isset($_GET['id_paciente_del'])) {
  $id_paciente = $_GET['id_paciente_del'];
  $query = "UPDATE paciente SET estado = 'B' WHERE id_paciente = $id_paciente";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    //die("Fallo");
    echo "<script>alert('Error! intentalo nuevamente')
    window.location='listado_pacientes.php';</script>";
  }
  echo"<script type='text/javascript'>
        alert('El paciente se eliminó correctamente');
        window.location='listado_pacientes.php';
        </script>";
}
?>