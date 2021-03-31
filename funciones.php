<?php

//Conexiones  (Usar Datos de la base de datos Propia)
//modificar esta funcion
$host1 = "localhost";
$user1 = "root";
$pass1 = "jatono84";
$db1 = "ts_hclinicas";


//Funcion de agregar nuevo paciente
function nuevo($host, $user, $pass, $db) {
//Listado de Parametros
    $idni = $_POST["inputDNI"];
    $iapellido = $_POST["inputApellido"];
    $inombre = $_POST["inputNombre"];
    $itel_cel = $_POST["inputTelCel"];
    $iemail = $_POST["inputEmail"];
    $idireccion = $_POST["inputDireccion"];
    $iedad = $_POST["inputEdad"];
    $iobra_social = $_POST["inputObraSocial"];
    $iocupacion = $_POST["inputOcupacion"];  
    $idisp_horaria = $_POST["inputDispHoraria"];
    $ifecha_alta = $_POST["inputFechaAlta"];
    $iestuvo_internado = $_POST["inputEstuvoInternado"];


    //revisa si ya existe el dni para no repetir dni
    $sql = "SELECT * FROM paciente WHERE dni='$idni';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>self.location= 'index.php?msg=aa01'</script>";
        mysqli_close($enlace);
    } else {
        mysqli_close($enlace);
        //conexion e insercion de datos
        $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
        $sql = "INSERT INTO paciente (dni, apellido, nombre, tel_cel, email, direccion, edad, obra_social, ocupacion, disp_horaria, fecha_alta, estuvo_internado) VALUES ( '$idni', '$iapellido', '$inombre','$itel_cel','$iemail','$idireccion', '$iedad','$iobra_social', '$iocupacion', '$idisp_horaria', '$ifecha_alta', '$iestuvo_internado')";

        if (!mysqli_query($enlace, $sql)) {
            echo "<script>self.location= 'index.php?msg=ef01'</script>";
        } else {
            mysqli_close($enlace);
            
            //llama a funcion para argegar historia clinica
            agregar($host, $user, $pass, $db, $idni);
            header("Location: agregar_intervencion.php");
        }
    }
}

//funcion de agregar historia
function agregar($host, $user, $pass, $db, $idni) {
    //Listado de Parametros
    $hmotivo = $_POST["inputMotivo"];
    $hdescrip = $_POST["inputDescripcion"];
    $hlenguaje = $_POST["inputLenguaje"];
    $hmpade = $_POST["inputPadecimiento"];
    $hantesP = $_POST["inputAntecendetesP"];
    $hpato = $_POST["inputPatologias"];
    $hdiag = $_POST["inputDiagnostico"];
    $htrata = $_POST["inputTratamiento"];

//Busca Primer Resultado con nombre
    $sql = "SELECT id FROM paciente WHERE dni='$idni';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ikey = $row["id"];
        //Inserta en la tabla de historia con el mismo id los datos restantes
        $sql2 = "INSERT INTO historia  (id,motivo,descrip,lenguaje,padecimiento,antnopato,antpato,diagnostico,tratamiento) VALUES ('$ikey','$hmotivo','$hdescrip','$hlenguaje','$hmpade','$hantesP','$hpato', '$hdiag','$htrata')";
        if (!mysqli_query($enlace, $sql2)) {
            echo "<script>self.location= 'index.php?msg=ef02'</script>";
        } else {
            echo "<script>self.location= 'index.php?id=78857&msg=cc01&fun=nt56&&name=" . $name . "'</script>";
        }
    } else {
        
    }
    mysqli_close($enlace);
}

//funcion de Listar pacientes
function listar($host, $user, $pass, $db) {
    $sql = "SELECT * FROM paciente;";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $link = str_replace(" ", "%20", $row["dni"]);
            echo "<a href=\"index.php?id=78857&fun=nt56&&dni=$link\" class=\"list-group-item list-group-item-action\">" . $row["dni"] . ' '. $row["apellido"] . ' '. $row["nombre"] . "</a>";
        }
    } else {
          echo "<script>self.location= 'index.php?msg=aa04'</script>";
    }
}

//funcion de Mostrar historia
function mostrar($host, $user, $pass, $db, $idni) {
    $idni = $_GET['dni'];
    $sql = "SELECT * FROM paciente WHERE dni='$idni';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ikey = $row["id"];
        $inombre = $row["nombre"];
        $iapellido = $row["apellido"];
        $itel_cel = $row["tel_cel"];
        $iemail = $row["email"];
        $idireccion = $row["direccion"];
        

        echo "
                <br><div class=\"form-row\">
                    <div class=\"form-group col-md-2\"><label for=\"inputNombre\">DNI</label>
                    <input type=\"text\" class=\"form-control\" name=\"inputDni\" value=\"" . $idni . "\" readonly>
                    </div>
                    <div class=\"form-group col-md-3\"><label for=\"inputApellido\">Apellido</label><input  type=\"text\" class=\"form-control\" name=\"inputApellido\" value=\"" . $iapellido . "\" readonly=\"\">
                    </div>
                    <div class=\"form-group col-md-3\"><label for=\"inputNombre\">Nombre</label><input name=\"inputNombre\" class=\"form-control\" value=\"" . $inombre . "\" readonly=\"\">
                    </div>
                    <div class=\"form-group col-md-3\"><label for=\"inputTel_cel\">Tel. Celular</label><input type=\"text\" class=\"form-control\" name=\"inputTel_cel\" value=\"" . $itel_cel . "\" readonly=\"\">
                    </div>
                    </div><div class=\"form-row\"><div class=\"form-group col-md-3\"><label for=\"inputEmail\">Email</label><input  type=\"text\" class=\"form-control\" name=\"inputEmail\" value=\"" . $iemail . "\" readonly=\"\">
                    </div>
                    <div class=\"form-group col-md-3\"><label for=\"inputProfesion\">Dirección</label>
                    <input  type=\"text\" class=\"form-control\" name=\"inputDireccion\" value=\"" . $idireccion . "\" readonly=\"\">
                    </div>
                </div>";

        /*$sql2 = "SELECT * FROM historia where id=$ikey;";
        $resulta = mysqli_query($enlace, $sql2);
        if (mysqli_num_rows($resulta) > 0) {
            echo "<h2 align='center'>Historia Clinica</h2>";
            $i = 1;
            while ($row2 = mysqli_fetch_assoc($resulta)) {
                echo "<h5 align='center'>Consulta numero $i</h5>";
                echo "<div class=\"form-group\"><label for=\"inputMotivo\">Motivo de Consulta</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputMotivo\" readonly=\"\">" . $row2["motivo"] . "</textarea></div><div class=\"form-group\"><label for=\"inputDescripcion\">Descripcion del Paciente</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputDescripcion\" readonly=\"\">" . $row2["descrip"] . "</textarea></div><div class=\"form-group\"><label for=\"inputLenguaje\">Lenguaje</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputLenguaje\" readonly=\"\">" . $row2["lenguaje"] . "</textarea></div><div class=\"form-group\"><label for=\"inputPadecimiento\">Padecimiento Actual</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputPadecimiento\" readonly=\"\">" . $row2["padecimiento"] . "</textarea></div><div class=\"form-group\"><label for=\"inputAntecedentesP\">Antecedentes Personales no Patológicos</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputAntecendetesP\" readonly=\"\">" . $row2["antnopato"] . "</textarea></div><div class=\"form-group\"><label for=\"inputPatologias\">Antecedentes Heredofamiliares (Patologías)</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputPatologias\" readonly=\"\">" . $row2["antpato"] . "</textarea></div><div class=\"form-group\"><label for=\"inputDiagnostico\">Diagnóstico</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputDiagnostico\" readonly=\"\">v" . $row2["diagnostico"] . "</textarea></div><div class=\"form-group\"><label for=\"inputTratamiento\">Sugerencia de Tratamiento</label>
                        <textarea rows=\"3\" class=\"form-control\" name=\"inputTratamiento\" readonly=\"\">" . $row2["tratamiento"] . "</textarea></div>";
                $i = $i + 1;
            }
        } else {
            echo "<script>self.location= 'index.php?msg=aa03'</script>";
        }
        */
        mysqli_close($enlace);
    } else {
        echo "<script>self.location= 'index.php?msg=aa02'</script>";
    }
}

//funcion de Editar datos

function editar($host, $user, $pass, $db, $id) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM paciente WHERE id='$id';";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ikey = $row["id"];
        $inombre = $row["nombre"];
        $iapellido = $row["apellido"];
        $itel_cel = $row["tel_cel"];
        $iemail = $row["email"];
        $idireccion = $row["direccion"];
        

        echo "<div class=\"form-row\">
                    <div class=\"form-group col-md-3\"><label for=\"inputDni\">DNI</label>
                    <input type=\"text\" class=\"form-control\" name=\"inputDni\" value=\"" . $idni . "\">
                    </div>
                    <div class=\"form-group col-md-3\"><label for=\"inputApellido\">Apellido</label><input  type=\"text\" class=\"form-control\" name=\"inputApellido\" value=\"" . $iapellido . "\" >
                    </div>
                    <div class=\"form-group col-md-3\"><label for=\"inputNombre\">Nombre</label><input name=\"inputNombre\" class=\"form-control\" value=\"" . $inombre . "\" >
                    </div>
                    <div class=\"form-group col-md-3\"><label for=\"inputTelcel\">Tel. celular</label><input type=\"text\" class=\"form-control\" name=\"inputTelcel\" value=\"" . $itel_cel . "\" >
                    </div>
            </div>
            <div class=\"form-row\">
                    <div class=\"form-group col-md-3\"><label for=\"inputEmail\">Email</label><input  type=\"text\" class=\"form-control\" name=\"inputEmail\" value=\"" . $iemail . "\" >
                    </div>
                    <div class=\"form-group col-md-6\"><label for=\"inputDireccion\">Dirección</label> <input  type=\"text\" class=\"form-control\" name=\"inputDireccion\" value=\"" . $idireccion . "\" >
                    </div>
            </div>
                
                <input id=\"numPac\" name=\"numPac\" type=\"hidden\" value=\"" . $ikey . "\">";

        mysqli_close($enlace);
    } else {
          echo "<script>self.location= 'index.php?msg=ef03'</script>";
    }
}

// Funcion de Actualizacion de Datos
function actualizar($host, $user, $pass, $db) {
    //Listado de Parametros 
    $idni = $_POST["inputDni"];
    $inombre = $_POST["inputNombre"];
    $iapellido = $_POST["inputApellido"];
    $itel_cel = $_POST["inputTelcel"];
    $iemail = $_POST["inputEmail"];
    $idireccion = $_POST["inputDireccion"];
    $ikey = $_POST["numPac"];

    $sql = "UPDATE paciente set `nombre`='$inombre', `apellido`='$iapellido', `tel_cel`='$itel_cel', `email`='$iemail', `direccion`='$idireccion' WHERE  `id`=$ikey ";
    $enlace = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
    $result = mysqli_query($enlace, $sql);
    if (!mysqli_query($enlace, $sql)) {
          echo "<script>self.location= 'index.php?msg=ef03'</script>";
    } else {
        mysqli_close($enlace);
        echo "<script>self.location= 'index.php?id=78857&msg=cc02&fun=nt56&&dni=" . $idni . "'</script>";
    }
}
?>