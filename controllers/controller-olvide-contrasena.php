<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $anio= date('Y');
    require_once("../views/olvide-contrasena.php");
    if(isset($_POST['enviar'])){
        require_once("../models/funciones-olvide-contrasena.php");
        require_once 'PHPMailer/Exception.php';
        require_once 'PHPMailer/PHPMailer.php';
        require_once 'PHPMailer/SMTP.php';
        $mail= new PHPMailer(true);
        try{
            //$mail->SMTPDebug= SMTP::DEBUG_SERVER;
            $cod_recuperar_contrasena= generar_codigo();
            $mail->isSMTP();
            $mail->Host= 'smtp.gmail.com';
            $mail->SMTPAuth= true;
            $mail->Username= 'no.responder.aulagaming@gmail.com';
            $mail->Password= 'kskzlfcaielfpqcq';
            $mail->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port= 587;
            $mail->setFrom('no.responder.aulagaming@gmail.com', 'No responder');
            $mail->addAddress($_POST['email']);
            $mail->isHTML(true);
            $mail->Subject= 'Reestablece tu contrasena';
            $mail->Body= 'Estimado usuario:<br/>A continuacion se muestra un codigo y un enlace para que puedas restablecer tu contrasena.<br/>- Codigo: '.$cod_recuperar_contrasena.'<br/>- Pulsa <a href="http://localhost/aula-gaming/controllers/controller-crear-nueva-contrasena.php">aqui</a> para reestablecer tu contrasena.';
            $mail->send();
            $db= conexion();
            if(insertar_codigo_base_datos($_POST['email'], $cod_recuperar_contrasena, $db))
                echo "<br/><div id=siete class=siete>Se te ha enviado un correo a ".$_POST['email']." para restablecer tu contraseña.</div>";         
        }
        catch(Exception $e){
            echo $mail->ErrorInfo.'<br/>No se pudo enviar un correo con un enlace para restablecer tu contraseña.';
        }    
    }    
?>