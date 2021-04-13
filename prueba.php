<?php
    require "./php/conexion.php";
    
    session_start();

    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];
    

?>

<?php include_once "./vistas/header.php"; ?>
    
<!-- Inicio contenido de las paginas -->

    <h1> esto es el contenido de las paginas</h1>

    <!-- Fin contenido de las paginas-->

        
<?php include_once "./vistas/footer.php"; ?>
</html>