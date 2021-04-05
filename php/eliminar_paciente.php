<?php
include("conexion.php");
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