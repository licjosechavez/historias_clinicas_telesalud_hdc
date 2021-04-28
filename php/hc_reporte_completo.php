<?php
$sql ="SELECT p.*, icl.*, ips.* 
FROM paciente p 
INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
INNER JOIN int_psicologica ips ON ips.id_int_cl_medica = icl.id_int_cl_medica
    
WHERE p.estado = 'A'";
?>