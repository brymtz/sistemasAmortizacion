<?php 

function todosBancos(){
    include 'conexion.php';

    $sqlListar= "SELECT idInst,nomInst FROM instituciones";
    $respuesta=$conexion->query($sqlListar);
    $result=array();
    $cadena="<option value='0'>Seleccione un banco</option>";
    if($respuesta->num_rows>0){
    
        while($filaestudiante=$respuesta->fetch_assoc()){
            $cadena.='
      
          
      <option value="'.$filaestudiante['idInst'].'" >'.$filaestudiante['nomInst'].'</option>			  
      
      ';
            
        }
        return $cadena;

    }else{
        $result="No hay instituciones";
    }
}
           
function Consumo($ID){
    include 'conexion.php';

    $sqlListar= "SELECT iConsumo FROM instituciones where idInst=$ID";
    $respuesta=$conexion->query($sqlListar);
    $result=array();
    if($respuesta->num_rows>0){
        while($filaestudiante=$respuesta->fetch_assoc()){

            array_push($result, $filaestudiante);
    
        }
    }else{
        $result="No asignado";
    }
}
                    
?>