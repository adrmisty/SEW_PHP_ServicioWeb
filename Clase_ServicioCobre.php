
<?php

session_start();
/*
    Representación textual de la información meteorológica de una ciudad determinada

    @author Adriana R.F. - UO282798
*/
class Datos_Cobre {

    private $symbol = "XCU";
    private $apikey = "hle45xma8ndubtcozb93v2x15jjemzwx9k9w6nwhfz05pbiba28sacovq025";
    private $base = "USD";
    private $endpoint = "latest";
    private $datos;
    private $resultado;
    
    function __constructor($base,$endpoint){
        $this->base = $base;
        $this->endpoint = $endpoint;
    }

    // Cambia unidades entre quilates y onzas
    public function setUnit($unit,$base){
        $this->endpoint = $unit;
        $this->base = $base;
    }

        // Carga los datos a partir de la URL en formato JSON
    // Muestra un mensaje de error en caso de ocurrir
    public function cargarDatos(){
        $url = "https://metals-api.com/api/" . $this->endpoint . "?access_key=" . $this->apikey . "&base=" . $this->base ."&symbols=" . $this->symbol;
        $this->datos = file_get_contents($url);
        $this->datos = json_decode($this->datos); // objeto PHP --> json
        if ($this->datos == null){
            $this->resultado = "<p>No se ha podido guardar la información requerida.<p>";
        } else {
            $cotizacion = $this->datos->rates->XCU;
            $fecha = $this->datos->date;
            $this->resultado = "<ul><li>Fecha: " . $fecha . "</li><li>" . number_format($cotizacion,3) . ' ' . $this->base . ' por onza </li></ul>';

        } 
        return $this->resultado;
    }
    
}

// Definición de una nueva sesión
if (!isset($_SESSION['divisas'])){
    $cobre = new Datos_Cobre('latest','USD');
    $_SESSION['divisas'] = $cobre;        
}
// Interacción con todos los botones
if (count($_POST)>0)
{
    $cobre = $_SESSION['divisas'];

    if (isset($_POST['usd'])) $cobre->setUnit('latest','USD');
    if (isset($_POST['eur'])) $cobre->setUnit('latest','EUR');
    if (isset($_POST['gbp'])) $cobre->setUnit('latest','GBP');

    $_SESSION['divisas'] = $cobre;
}

?>