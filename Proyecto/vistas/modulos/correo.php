<?php
    if(isset($_POST["enviar"])){
        if(!empty($_POST["txtNombre"]) && !empty($_POST["txtCorreo"]) && !empty($_POST["txtCorreoDestinatario"]) && !empty($_POST["txtAsunto"])) {
             $nombre=$_POST["txtNombre"];
             $correoUsuario=$_POST["txtCorreo"];
             $correoDestinatario= $_POST["txtCorreoDestinatario"];
             $asunto=$_POST["txtAsunto"];
             $mensaje=$_POST["txtMensaje"]; 
             
             $contenido = "Nombre: ". $nombre. "\nCorreo:" . $correoUsuario. "\nAsunto". $asunto . "\nMensaje:" . $mensaje;
             $mail = mail($correoDestinatario, $asunto, $contenido);
             if($mail){
                 echo "<h4>enviado exitosamente</h4>";
             }else{echo "no llego el mensaje";}
        }
    }   
?>

<?php 
  /*  ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "prueba@solucionex.com";
    $to = "javiernuber@gmail.com";
    $subject = "Prueba de envio de email con PHP";
    $message = "Esto es un email de prueba enviado con PHP";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Email enviado!!"; */
?>