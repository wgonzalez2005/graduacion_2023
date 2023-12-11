<?php
require_once './Data/PHPMailer/PHPMailer.php';
require_once './Data/PHPMailer/SMTP.php';
class Mail
{
    /*RECIBE UN ARRAY POR LO MENOS 3 CLAVES Y VALOR*/
    public static function SendMail($email, $codigo)
    {
        header("Content-Type: text/html; charset=ISO-8859-1", true);
        @$name = "BagoApp";
        @$mail = new PHPMailer(true);
        @$mail->IsSMTP();
        @$mail->SMTPDebug   = 2;
        @$mail->CharSet     = "UTF-8";
        @$mail->Debugoutput = 'html';
        @$mail->IsHTML(true);
        @$mail->SMTPDebug  = 2;
        @$mail->Host       = 'smtp.gmail.com';
        @$mail->Port       = 587;
        @$mail->SMTPAuth   = true;
        @$mail->Password   = "Password2005****";
        @$mail->Username   = "vagoapp2020@gmail.com";
        @$mail->SMTPSecure = 'tls';

        try {
            @$mail->AddAddress($email, $name);
            @$mail->setFrom('vagoapp2020@gmail.com', $name);
            @$subject       = 'Resetear contraseña de Cuenta';
            @$sendsubject   = "=?utf-8?b?" . base64_encode($subject) . "?=";
            @$mail->Subject = $sendsubject;
            @$mensagem      = "<!DOCTYPE html>
                            <html>
                            <body>
                            Para resetear su contraseña coloque el siguiente código en la aplicación <b>" . $codigo . "</b>\n
                            </body>
                            </html>";
            @$mail->Body = $mensagem;

            @$mail->IsHTML(true);
            @$mail->Send();
        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }

}
