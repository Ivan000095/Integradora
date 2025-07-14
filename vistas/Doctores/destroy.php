<?php
    include('../../modelos/Doctor.php');
    $idDoctor= $_REQUEST['idDoctor'];
    $Doctor = Doctor::find($idDoctor);
    $Doctor->destroy();
    echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Doctores">';
?>