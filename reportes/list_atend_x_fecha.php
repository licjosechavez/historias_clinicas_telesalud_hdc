<?php

    //require "conexion.php";
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    
?>
<?php include_once "../php/header.php"; ?>

<!-- Inicio contenido de las paginas -->
        <div class="container mt-5 bg-light">
        <h2 align='left'>Listado de pacientes atendidos por fecha</h2>
      
      <div class="col-lg-12">

      <form action="reporte_entre_fechas_pdf.php" name="form1" method="post">
        <table style="width: 50%; border: 1px solid">

            <tr>
            
            <td style="width: 25%; text-align: center;"><br><label for="fecha_inicio">Fecha inicial</label><br></td>
            <td style="width: 25%;"><br><input name="fecha_inicio" type="datetime-local" /><br></td>
            </tr>
            <tr>
            <td style="width: 25%; text-align: center;"><label for="fecha_final"><br>Fecha final</label><br></td>
            <td style="width: 25%;"><br><input name="fecha_final" type="datetime-local" /><br></td>
            </tr>
            <tr>
            <br><br>
            <td colspan="2" style="width: 99.8299%; text-align: center;"><br><input class="btn btn-primary my-2 mr-1" name="Enviar" type="submit" value="Generar informe en PDF" /><br><br></td>
            </tr>
        <br>
        </table>
      </form>

        <br><br><br><br><br>

      </div>
    </div>
  </div>         
</div>


        </div>

<!-- Fin contenido de las paginas-->

        
<?php include_once "../php/footer.php"; ?>