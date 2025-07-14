<?php 
    require('../../modelos/Establecimiento.php');
     $establecimiento = new Establecimiento(); 
  
  
    if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['Foto']['name'];
        $tmpPath = $_FILES['Foto']['tmp_name'];

        $carpetaDestino = '../../uploads/';

        $nombreUnico = uniqid() . '_' . basename($nombreArchivo);
        $rutaFinal = $carpetaDestino . $nombreUnico;

        if (move_uploaded_file($tmpPath, $rutaFinal)) {
            // Guardar ruta relativa
            $establecimiento->Foto = 'uploads/' . $nombreUnico;
        } else {
            $establecimiento->Foto = null; // evitar error si no se guarda
        }
    } else {
        $establecimiento->Foto = null;
    }    
    
    
    
    
    
    $establecimiento -> Nombre = $_REQUEST['Nombre'];
    $establecimiento -> Descripcion = $_REQUEST['Descripcion'];
    $establecimiento -> Horario = $_REQUEST['Horario'];
    $establecimiento -> Dias_labo = $_REQUEST['Dias_labo'];
    $establecimiento -> Foto = $_REQUEST['Foto'];
    $establecimiento -> DireccionyRef= $_REQUEST['DireccionyRef'];

    
    $establecimiento -> save();
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
    

?>