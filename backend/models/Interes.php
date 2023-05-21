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
           
function Consumo(){
    include 'conexion.php';

    $sqlListar= "SELECT iConsumo FROM instituciones";
    $respuesta=$conexion->query($sqlListar);
    $result=array();
    $cadena="<option value='0'>Seleccione tipo de interes</option>";
    if($respuesta->num_rows>0){
    
        while($filaestudiante=$respuesta->fetch_assoc()){
            $cadena.='
      
          
      <option value="'.$filaestudiante['iConsumo'].'" >'.$filaestudiante['nomInst'].'</option>			  
      
      ';
            
        }
        return $cadena;

    }else{
        $result="No hay instituciones";
    }
}
                    
?>