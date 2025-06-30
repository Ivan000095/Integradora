
<?php 
 
require_once 'SpynTPL.php'; 
require_once 'models/config.php'; 
 
$mysqli = new mysqli($servidor, $usuario, $password, $bd); 

 
if(isset($_POST['Nombre'])) 
{ 
    require_once 'models/Establecimiento.php'; 
    require_once 'models/funciones.php'; 
 
    $Nombre = $_POST['Nombre']; 
    $Descripcion = $_POST['Descripcion']; 
    $Horario = $_POST['Horario']; 
    $Dias_lab = $_POST['Dias_lab']; 
    $Latitud_Long = $_POST['Latitud_Long']; 
    
 
    $hospitalpeachepe = new Establecimiento(0, $Nombre, $Descripcion, $Horario, $Dias_lab, $Latitud_Long); 
    $hospitalpeachepe->save($mysqli); 
    unset($_POST); 
    goToPage('establecimiento_add.php'); 
} 
$title = 'Agregar nuevo establecimiento'; 
$target = 'establecimiento_add.php'; 
 

 
$html = new SpynTPL('views/'); 
$html->Fichero('frmEstablecimiento.html'); 
$html->Asigna('title',$title); 
$html->Asigna('target',$target); 
 

echo $html->Muestra();
