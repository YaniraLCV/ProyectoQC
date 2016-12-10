<?php 

class Sesion{
    
 	public function inicioSesion(){
        session_start();        
	}
        
	public function checkSesion() {
        $checkSesion = false;
        if (isset($_SESSION['email'])){
            if (!empty($_SESSION['email'])){
                $checkSesion = true;               
            }
		}
        return $checkSesion;
	}
    
    public function crearSesion(
        $fechaSesion,
        $mail
    ){        
        if(isset($_SESSION) && count($_SESSION)>0){
            session_destroy();
        }
        session_start();
        $_SESSION['fechaSesion'] = $fechaSesion;
        $_SESSION['email'] = $mail;
    }
    
    public function finSesion($ruta){
        session_destroy();
        session_start();
        $_SESSION['cod_usua']="";

        // Destruir todas las variables de sesión.
        $_SESSION = array();
        // Si se desea destruir la sesión completamente, borre también la cookie desesión.
        // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!

        if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,$params["path"], $params["domain"],$params["secure"], $params["httponly"]);
        }
        // Finalmente, destruir la sesión.
        session_destroy();
        echo "<html><script language = 'javascript'>document.location = '".$ruta."';</script></html>";
    }
    
 }

?>
