<?php 

include_once("../model/index.php");


class controller {

private $Cart = 'Private';
private $arr = 'Private';
private $Preco = 'Private';
private $quantidade = 'Private';
private $Data = 'Private';
private $Saldo = 'Private';



function  __construct() {

        $this->Cart =  new Carteira();
        $this->Cart->initDB();


    }

public function lincaDados($DataInicio, $DataFim) {
    
        $this->arr = $this->Cart->Dados($DataInicio, $DataFim);
 
    }

public function lincaAcoes($Dia) {

        $this->acoes = $this->Cart->Acoes($Dia);

    }

public function rendimento($DataInicio, $DataFim){
        $this->lincaDados($DataInicio,$DataFim);
        $this->lincaAcoes($DataInicio);
        $valor = $this->acoes["price"];
        // print_r($valor);
        $arrtemp = array();
        foreach ($this->arr as $loli) {
        $total = $valor - $loli / $valor * 100;
        $novo = sprintf("%.2f", $total);
        array_push($arrtemp, $novo);
        }
        return $arrtemp;
    }

}

// $console = new controller();
// // $console->lincaDados("2019-04-30","2029-08-20");
// // $console->lincaAcoes('01/04/2020');
// // $console->rendimento("2019-04-30","2029-08-20");
// // $console->lincaDados("2019-04-30","2029-08-20");
// $console->rendimento("2019-04-30","2029-08-20");

?>