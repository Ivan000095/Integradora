<?php
    include('../../modelos/Doctor.php');
    $Doctor = new Doctor();

    // Subida de imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['foto']['name'];
        $tmpPath = $_FILES['foto']['tmp_name'];

        $carpetaDestino = '../../uploads/';

        $nombreUnico = uniqid() . '_' . basename($nombreArchivo);
        $rutaFinal = $carpetaDestino . $nombreUnico;

        if (move_uploaded_file($tmpPath, $rutaFinal)) {
            // Guardar ruta relativa
            $Doctor->foto = 'uploads/' . $nombreUnico;
        } else {
            $Doctor->foto = null; // evitar error si no se guarda
        }
    } else {
        $Doctor->foto = null;
    }

    // Datos del formulario
    $Doctor->nombre = $_POST['nombre'];
    $Doctor->cedula = $_POST['cedula'];
    $Doctor->correo = $_POST['correo'];
    $Doctor->password = $_POST['password'];
    $Doctor->descripcion = $_POST['descripcion'];
    $Doctor->idiomas = $_POST['idiomas'];
    $Doctor->genero = $_POST['genero'];
    $Doctor->fecha = $_POST['fecha'];
    $Doctor->telefono = $_POST['telefono'];
    $Doctor->idespecialidad = $_POST['idespecialidad'];
    $Doctor->horario = $_POST['horario'];
    $Doctor->diaslab = $_POST['diaslab'];
    $Doctor->ubicacion = $_POST['ubicacion'];
    $Doctor->costo = $_POST['costo'];
    
    $Doctor->save();
    echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Doctores">';
?>
