<?php 

class Establecimiento 
{ 
    public $id_Establecimiento; 
    public $Nombre; 
    public $Descripcion; 
    public $Horario; 
    public $Dias_lab; 
    public $Latitud_long; 
   
    private static $totalPage;
    private static $establecimientosPerPage;
    private static $bd;

    public function __construct($id_Establecimiento, $Nombre, $Descripcion, $Horario, $Dias_lab, $Latitud_long) 
    { 
        $this->id_Establecimiento = $id_Establecimiento; 
        $this->Nombre = $Nombre; 
        $this->Descripcion = $Descripcion; 
        $this->Horario = $Horario; 
        $this->Dias_lab = $Dias_lab; 
        $this->Latitud_long = $Latitud_long; 
    
    } 

    public function save($bd){
        if($stmt = $bd -> prepare ("Insert into establecimiento values (0,?,?,?,?,?)")){
            $stmt -> bind_param("sssss",
            $this -> Nombre,
            $this -> Descripcion,
            $this -> Horario,
            $this -> Dias_lab,
            $this -> Latitud_long
        );
        $stmt -> execute();
        $stmt -> close();
        }
    }



    public function genero() 
    { 
        return Genero::getGenero($this->idGenero); 
    } 
 
    public static function init($bd, $establecimientosPerPage) 
    { 
        self::$bd = $bd; 
        $stmt = self::$bd->prepare("select count(id_Establecimiento) as cantidad from establecimiento"); 
        $stmt->execute(); 
        $stmt->bind_result($cantidad); 
        $stmt->fetch(); 
        self::$establecimientosPerPage = $establecimientosPerPage; 
        self::$totalPage = ceil($cantidad/$establecimientosPerPage); 
    }

     public static function totalPage() 
    { 
        return self::$totalPage; 
    }

    public static function getEstablecimientosPage($numPage) 
{ 
$Establecimientos = []; 
$offset = ($numPage-1) * self::$establecimientosPerPage; 
$stmt = self::$bd->prepare("select * from establecimiento limit ?,?"); 
$stmt->bind_param("ii",$offset, self::$establecimientosPerPage); 
$stmt->execute(); 
$stmt->bind_result($id_Establecimiento, $Nombre, $Descripcion, $Horario, $Dias_lab, 
$Latitud_long);     
while($stmt->fetch()) 
{ 
array_push($Establecimientos, new Establecimiento($id_Establecimiento, $Nombre, $Descripcion, $Horario, 
$Dias_lab, $Latitud_long)); 
} 
$stmt->close(); 
return $Establecimientos; 
} 
}


 

if(isset($argc) && $argc == 2)
{
    $mysqli = new mysqli("localhost", "root", "", "servifinde");
    switch($argv[1])
    {
        case "nuevo":
            $imss = new Establecimiento(0,'IMSS', 'Centro de salud gratuito, en donde te mochan la pierna por una fiebre', '8:00 am - 8:00pm', 'Lunes a viernes', 'Toluca, Chiapas');
            $imss->save($mysqli);
            break;
        case "consulta":
            Establecimiento::init($mysqli, 2) ;
            $totalPage = Establecimiento :: totalPage();
            print("Total de page: $totalPage \n");
            print_r(Establecimiento::getEstablecimientosPage(1));
            break;
    
    }
}