<?php
// this file is trigered after the user clicks on forget password in signin page
// this file check first if the email is found , and if found it send a code to the email to allow the user to change his password

////// phpmailer
/// include required phpmailer files
require './phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require './phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';


/// Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require './phpmailer/vendor/autoload.php';

if (isset($_POST["email"])) {
    include("./cred.php");
    $email = trim(strip_tags(htmlspecialchars($_POST["email"])));
    $code = rand(1000, 9999);

    $sql = "SELECT email FROM user WHERE email = '$email'";
    $result = mysqli_query($db_connect, $sql) or die("can't receive data from database");
    $row = mysqli_fetch_assoc($result);
    if ($row and $row["email"] == $email) {
        if (isset($_POST["send"])) {
            if ($_POST["send"] == true) {
                ////// phpmailer continues
                //
                //Create an instance of phpmailer; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    ///////////// Server settings ///////////////
                    ////
                    /// Enable verbose debug output
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

                    /// Set mailer to use smtp
                    $mail->isSMTP();                                            //Send using SMTP

                    /// define smtp host
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through

                    /// enable smtp authentication
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

                    /// set gmail username
                    // to be able to use this gmail to send emails , you should go to the gmail app and clicks [Manage Your Google Account] , then go to [Security] , and turn two factor varification on , then go to app passwords in two factor varification , select other devices in filter , then put a name for the app or anything then press on generate code , after that copy the code and paste it here
                    $mail->Username = "YourEmail.com";

                    /// set gmail password
                    $mail->Password = "YourPassword";

                    //Enable implicit TLS encryption
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    $mail->Port       = 465;
                    ///////////////////////////////////////



                    /////////////// Recipients ///////////
                    ////
                    /// set sender email
                    $mail->setFrom("YourEmail.com", 'hassan hotel');

                    /// Add recipient
                    $mail->addAddress($email);
                    /////////////////////////////////////



                    ///////////// Content ////////////
                    ////
                    // Enable HTML(Set email format to HTML)
                    $mail->isHTML(true);

                    /// set gmail subject
                    $mail->Subject = "Hassan Hotel";

                    /// Email body
                    $mail->Body = "<h2>Use this code to change your password</h2></br><p>the code is $code</p>";
                    $mail->AltBody = "Use this code to change your password , the code is $code"; // This is the body in plain text for non-HTML mail clients
                    /////////////////////////////////



                    /// Finally send email////////
                    $mail->send();

                    /// create a file and write the code in it
                    $handle = fopen("c.php", "w+");
                    fwrite($handle, '<?php ' . "\r\n" . '$code = ' . $code . "\r\n?>");
                    fclose($handle);

                    /// i create an array to put the data that i want to send back
                    //$data = ["msg" => "Message has been sent" , "code" => $code];
                    $data = ["msg" => "a code was sent to your email"];

                    /// transform the array into json
                    echo json_encode($data);
                } catch (Exception $e) {
                    echo '{"msg":"Message could not be sent to your email. Mailer Error: "' . $mail->ErrorInfo . ' , "code"= 0}';

                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "correct email";
            }
        }
    } else {
        echo "Email Not Found";
    }
}
