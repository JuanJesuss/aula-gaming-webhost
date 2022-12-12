<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $anio= date('Y');
    require_once("../views/registro.php");
    if(isset($_POST['registrarse'])){
        require_once("../models/funciones-registro.php");
        $db= conexion();
        if(registrar($_POST['email'], md5($_POST['password']), $_POST['alias'], strtolower($_POST['turno']), strtolower(eliminar_tildes(trim($_POST['nombre']))), strtolower(eliminar_tildes(trim($_POST['apellidos']))), $db)){
            echo "<div id=trece class=trece>Registro efectuado con éxito.</div>";
            require_once 'PHPMailer/Exception.php';
            require_once 'PHPMailer/PHPMailer.php';
            require_once 'PHPMailer/SMTP.php';
            $mail= new PHPMailer(true);
            try{
                //$mail->SMTPDebug= SMTP::DEBUG_SERVER;
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
                $mail->Subject= 'Bienvenido al Aula Gaming - IES Leonardo Da Vinci';
                $mail->Body= 'Hola '.eliminar_tildes(trim($_POST['nombre'])).'.<br/>Bienvenido al Aula Gaming - IES Leonardo Da Vinci.<br/>Es un placer recibirte.';
                $mail->send();
            }
            catch(Exception $e){
                echo $mail->ErrorInfo.'<br/>No se pudo enviar correo de bienvenida.';
            }
        }
    }
?>