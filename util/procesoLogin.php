<?php
include("conexionServer.php");
include("sesion.php");

$con = new DBManager();
$respuesta = new stdClass();
$sesion = new Sesion();

$con->DBConectar();
$fetch_array = $con->BDGestor();

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];
$cont = 0;
$conLdap = false;
$nom_usua = '';
$es_admin = '';
$mail = '';
$planta_id = "";
$claveprovisional_sn = '';
$pini = '';

if(($usuario!='' || $usuario!=null) && ($clave!='' || $clave!=null)){
    
    $sql = "
        SELECT TOP 1 *
        FROM sgd_usuario AS a        
        INNER JOIN sgd_accessos AS b ON (a.cod_usua=b.cod_usua)
        WHERE a.cod_usua = '".$usuario."'
    ";
    if($fetch_array=='mysqli_fetch_array'){
        $sql = "
            SELECT *
            FROM empleado AS a        
            WHERE a.email = '".$usuario."'
            LIMIT 1;
        ";
    }
    
    $resultado = $con->DBConsulta($sql);
    
    $estado = '';
    $contador = 0;
    $db_clave = '';

    if($resultado==true){
        while($filaCod = $fetch_array($resultado)){
            $fila = $filaCod;
            $nom_usua = $fila['email'];
            $estado = $fila['estado'];
            $db_clave = $fila['clave'];
            $contador++;            
        }
    }
    
    if($contador>0){
        if($estado==1){
            if($db_clave==$clave){
                //***************************************************  Crea Sesion

                $sesion->crearSesion(
                    date('Y-m-d H:i:s'),
                    $mail
                );

                $respuesta->estado = 4;

            }else{
                $respuesta->estado = 3;
            }
        }else{
            $respuesta->estado = 2;
        }        
    }else{
        $respuesta->estado = 1;
    }    
}else{
    $respuesta->estado = 0;
}

print_r(json_encode($respuesta));

?>