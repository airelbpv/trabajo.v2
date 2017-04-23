 <?php
 require 'PHPMailerAutoload.php';
 //require_once('class.phpmailer.php');
    //include("class.smtp.php"); 
 //   $nameField = $_POST['name'];
    //$emailField = $_POST['email'];
    //$messageField = $_POST['message'];
    //$phoneField = $_POST['contactno'];
    //$cityField = $_POST['city'];

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

//$body .= $nameField;

try {
     //$mail->Host       = "mail.gmail.com"; // SMTP server
      //$mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      //$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	  $mail->SMTPSecure = "tls";
      $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
      //$mail->Port       = 465;   // set the SMTP port for the GMAIL server
	  $mail->Port       = 587; //tls
      $mail->SMTPKeepAlive = true;
      $mail->Mailer = "smtp";
      $mail->Username   = "introingenieria123@gmail.com";  // GMAIL username
      $mail->Password   = "1CuthutU";            // GMAIL password
      $mail->AddAddress($_POST['nombre');
      $mail->SetFrom('introingenieria123@gmail.com', 'def');
      $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
      //$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
      //$mail->MsgHTML($body);
	  $mail->Body    =$_POST("nombre").$_POST("apellido").$_POST("tarjeta").$_POST("phone");
      $mail->Send();
      echo "Message Sent OK</p>\n";
      //header("location: ../test.html");
} catch (phpmailerException $e) {
      echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
      echo $e->getMessage(); //Boring error messages from anything else!
}
?>