<?php 

class Carteira 
{
    private $conn;

    private $DataInicio = 'Private';
    private $DataFinal = 'Private';

    private $Porcentagem = 'Private';
    private $Rendimento = 'Private';

    function bolsa() 
    {
        echo $this->DataInicio;
        echo $this->DataFinal;
        echo $this->Porcentagem;
        echo $this->Rendimento;
    }   

    public function initDB(){
        $this->conn = pg_connect("host=localhost dbname=bolsa
                                user=postgres password=postgres");
        if(!$this->conn) {
             echo "deu erro";
       
            }

    }


    public function Dados($DataInicio, $DataFinal)
    {
        // var_dump(isset($this->conn));
        $result =   @pg_query($this->conn, "SELECT * from user_trade
                                         where data >= '$DataInicio' and data <= '$DataFinal' ");
            if(!$result ) {
                echo 'Deu Ruim. \n';
            }

            $temp = array();
            while($arr =  pg_fetch_assoc($result)){
                array_push($temp,$arr["preco"]);
            }
        // print_r($temp); 
        return $temp;
        
    }

    public function Acoes($dia) {
           $invest = @pg_query($this->conn, "SELECT * from instrument_quote
                                            where '$dia' <= date order by date desc limit 1");
        $retorno =  @pg_fetch_assoc($invest);    
        //   print_r($retorno);  
        return $retorno;                               
    }
}

// $Cart = new Carteira();
// $Cart->initDB(); 
// $Cart->Dados("2019-04-30","2029-08-20");
// $Cart->Acoes('01/04/2020');


?>