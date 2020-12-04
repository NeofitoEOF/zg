<?php

include_once('../controller/index.php');


class view {

    private $console = 'Private';



    function  __construct() {
       $this->console = new controller();
    }

    public function valores($ValorInicial, $ValorFinal){
        // $this->arr = $this->console->valores($valorinicial,$valorfinal);
       $resultado =  $this->$console->rendimento("2019-04-30","2029-08-20");
        print_r($resultado);
    }


}

$v = new view();
$v->valores($_GET["ValorInicial"], $_GET["ValorFinal"]);


// termina aqui 
?>
        
        <html>
        <head>
        </head>
        </body>
        </html>