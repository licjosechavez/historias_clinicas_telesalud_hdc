<?php
    $host1 = "localhost";
    $user1 = "root";
    $pass1 = "jatono84";
    $db1 = "ts_hclinicas";
    $sql = "SELECT * FROM paciente";
    $enlace = mysqli_connect($host1, $user1, $pass1, $db1) or die("Error al conectar con la base de datos");
    $resultado = mysqli_query($enlace, $sql);

    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historia Clinica TeleSalud</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link  rel="icon"   href="img/logo.ico" type="img/ico" />
          <!--datables CSS básico-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../vendor/datatables/datatables.min.css"
    />
    <!--datables estilo bootstrap 4 CSS-->
    <link
      rel="stylesheet"
      type="text/css"
      href="../vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css"
    />
    </head>
    <body> 
    <nav class="navbar navbar-light justify-content-between" style="background-color:#e3f2fd;">
        <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="../index.php">Tablero de comandos</a>
                    <a class="dropdown-item" href="../php/nuevo_paciente.php">Nuevo paciente</a>
                    <a class="dropdown-item" href="../php/listado_pacientes.php">Listado de pacientes</a>
                    <a class="dropdown-item" href="./agregar_intervencion.php">Agregar intervención</a>
                    <a class="dropdown-item" href="#">Reportes</a>
                </div>
            </div>
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.png" width="300" height="50" class="d-inline-block align-top" alt="">              
            </a>            
            <div></div>   
        </nav>
        <br>
        <div class="container mt-5 bg-light">
        <h2 align='left'>Listado de pacientes</h2><br>
      
      <div class="col-lg-12">
      <div class="table-responsive">
        <table
          id="example"
          class="table table-striped table-bordered table-hover "
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>ID</th>
              <th>DNI</th>
              <th>Apellido</th>
              <th>Nombres</th>
              <th>Tel. Celular</th>
              <th>Email</th>
              <th>Dirección</th>
              <th>Acciones</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
           while($row = $resultado->fetch_assoc()){?>
              <tr> 
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["dni"]; ?></td>
                <td><?php echo $row["apellido"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["tel_cel"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["direccion"]; ?></td>
                <td><a href="nuevo_int_cl_medica.php?id=<?php echo $row['id']?>" class="btn btn-info btn-sm" title="Agregar Int. Cl. Médica"><i class="far fa-notes-medical"></i> </a> 
                <a href="editar_paciente.php?id=<?php echo $row['id']?>" class="btn btn-secondary btn-sm" title="Editar paciente"><i class="fas fa-user-edit"></i> </a> 
                <a href="eliminar_paciente.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm" title="Eliminar paciente"><i class="fas fa-user-times"></i> </a>
                </td>
          
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>         
</div>


        </div>
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- datatables JS -->
    <script type="text/javascript" src="../vendor/datatables/datatables.min.js"></script>    
    <!-- código propio JS --> 
    <script type="text/javascript" src="../js/main.js"></script>  
        <script src="../js/bootstrap.min.js"></script>
        <br><br><br><br><br><br><br>
    </body>
    <footer class="font-small mt-5" style="background-color: #002752;position: fixed; bottom: 0px; width: 100%; height: 50px">
        <div class="text-white text-center py-3">© 2020 - Área de Sistemas - HDC
            <a class="text-info" href="#"></a>
        </div>
    </footer>
</html>