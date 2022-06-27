<?php
include_once SITE_ROOT. 'api/Loader.php';
include_once SITE_ROOT . 'api/libs/PHPMailer/src/PHPMailer.php';
include_once SITE_ROOT . 'api/libs/PHPMailer/src/SMTP.php';
include_once SITE_ROOT . 'api/libs/PHPMailer/src/Exception.php';


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 class Email
{

    /**
     * @var PHPMailer
     */
    private $mail;
    private $toAddressList , $ccAddressList, $bccAddressList = [];

    private $isHtml = true;
    private $subject = "Email From MatalaCinnamon";
    private $replyToMailEmail = 'no-reply@matalacinnamon.com';
    private $replyToMailName = 'no-reply';

    private $body = "";
    private $altBody = "";


    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }
    /**
     * @param mixed $replyToMailEmail
     */
    public function setReplyToMailEmail($replyToMailEmail)
    {
        $this->replyToMailEmail = $replyToMailEmail;
    }

    /**
     * @param mixed $replyToMailName
     */
    public function setReplyToMailName($replyToMailName)
    {
        $this->replyToMailName = $replyToMailName;
    }

    /**
     * @return bool
     */
    public function isHtml(): bool
    {
        return $this->isHtml;
    }

    /**
     * @param bool $isHtml
     */
    public function setIsHtml(bool $isHtml)
    {
        $this->isHtml = $isHtml;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getAltBody(): string
    {
        return $this->altBody;
    }

    /**
     * @param string $altBody
     */
    public function setAltBody(string $altBody)
    {
        $this->altBody = $altBody;
    }


    public function addToAddress($mail,$name = null){
        $this->mail->addAddress($mail,$name);
    }

    public function addCcAddress($mail,$name = null){
        $this->mail->addCC($mail,$name);
    }

    public function addBccAddress($mail,$name = null){
        $this->mail->addBCC($mail,$name);
    }

    public function send(){
        //Create an instance; passing `true` enables exceptions
        $mail = $this->mail;
        try
        {                    //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = EMAIL_SERVER;                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = EMAIL_USERNAME;                     //SMTP username
            $mail->Password = EMAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port =EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('no-reply@matalacinnamon.com', 'Matala Cinnamon');
            $mail->addReplyTo($this->replyToMailEmail, $this->replyToMailName);


            //Content
            $mail->isHTML($this->isHtml());                                  //Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body = $this->body;
            $mail->AltBody = $this->altBody;
            if($mail->send()){
                return  true;
            }else{
                return false;
            }
        }

        catch
        (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        $this->mail = $mail;
        return false;
    }

}