 <?php
 require 'PHPMailerAutoload.php';
 //require_once('class.phpmailer.php');
    //include("class.smtp.php"); 
 //$nameField = $_POST['nombres'];
    //$emailField = $_POST['email'];
    //$messageField = $_POST['message'];
    //$phoneField = $_POST['contactno'];
    //$cityField = $_POST['city'];

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP



try {
	if ($_POST) {
		// Execute code (such as database updates) here.
		//echo "entre \n";
		// Redirect to this page.
		//guardo variables
		$nombre = $_POST['nombres'];
		$apellido = $_POST['apellidos'];
		$tarjeta = $_POST['tarjeta'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$body = $nombre;
		$body .= $apellido;
		//echo htmlspecialchars($_POST['nombres']);
		//exit();
		//$mail->Host       = "mail.gmail.com"; // SMTP server
		//$mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->SMTPSecure = "tls";
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		//$mail->Port       = 465;   // set the SMTP port for the GMAIL server
		echo $body;
		$mail->Port       = 587; //tls
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->Username   = "introingenieria123@gmail.com";  // GMAIL username
		$mail->Password   = "1CuthutU";            // GMAIL password
		$mail->AddAddress($correo, 'Usuario ' . $nombre);
		$mail->SetFrom('introingenieria123@gmail.com', 'Registrador');
		$mail->Subject = 'Correo de registro de usuario';
		$mail->AltBody = 'Para ver el mensaje, por favor use un browser compatible HTML'; // optional - MsgHTML will create an alternate automatically
		$mail->MsgHTML($body);
		$mail->Body    = '<b>gracias por su compra!</b><li>' . "nombre: " . $nombre . '</li><li>' . "apellido: " . $apellido . '</li><li>' . "numero de tarjeta: " . $tarjeta . '</li><li>' . "telefono: " . $telefono . '</li>';
		if ($mail->send()) {
			echo "Mensaje enviado OK</p>\n";
			header("location:agradecer.html");
		} else {
			print('Error: ' . $mail->ErrorInfo) ;
		}
		//$mail->Send();
		//header("location: ../test.html");
	}else{
		echo "error recibiendo parametros\n"; 
	}
} catch (phpmailerException $e) {
	echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
	echo $e->getMessage(); //Boring error messages from anything else!
}
     
?>