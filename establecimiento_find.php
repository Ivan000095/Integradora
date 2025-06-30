<?php 
require_once 'SpynTPL.php'; 
require_once 'models/config.php'; 
require_once 'models/Establecimiento.php'; 
 
$html = new SpynTPL('views/'); 
$html->Fichero('consultarEstablecimiento.html'); 
$html->Asigna('msg',''); 
 
$mysqli = new mysqli($servidor, $usuario, $password, $bd); 
Establecimiento::init($mysqli, 1); 
 
$activePage = 1; 
if(isset($_GET["page"])) 
{ 
    $activePage = $_GET["page"]; 
} 
$totalPage = Establecimiento::totalPage(); 
$Establecimientos = Establecimiento::getEstablecimientosPage($activePage); 
 
for($pagina=1;$pagina<=$totalPage;$pagina++) 
{ 
    $datos['active'] = ""; 
    $datos['pagina'] = $pagina; 
    if($pagina == $activePage) 
    { 
        $datos['active'] = 'active'; 
    } 
    $html->AsignaBloque('paginas', $datos); 
} 
 
foreach($Establecimientos as $Establecimiento) 
{ 

    $html->AsignaBloque('Establecimientos',$Establecimiento); 
} 
echo $html->Muestra(); 