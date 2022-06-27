<?php
include_once '../../Config/Config.php';
include_once '../../Config/Email.php';
include_once '../Loader.php';
$emailClass = new Email();

$body = $_POST['body'] ?? '';
$email = $_POST['email'] ?? '';
$name = $_POST['name'] ?? '';
$country = $_POST['country'] ?? '';
$phone = $_POST['phone'] ?? '';
$ip = getUserIP();

$subject = $_POST['subject'] ?? 'New message from the website contact form - '. $name;

$subject = StringHelper::safeString($subject);
$body = StringHelper::safeString($body);
$name = StringHelper::safeString($name);
$email = StringHelper::safeString($email);
$ip = StringHelper::safeString($ip);
$phone = StringHelper::safeString($phone);
$country = StringHelper::safeString($country);

$mailModel = new MailsModel();

$errors = [];

try{

    $insert = $mailModel->insert($subject,$body,$email,$name,$ip,$phone,$country);
}catch (Exception $ee){
    $errors['database'] = $ee->getMessage();
}

$emailClass->addToAddress(EMAIL_USERNAME);
$emailClass->setSubject($subject);
$emailClass->setAltBody(getTextBody($subject,$body,$email,$name,$phone,$country));
$emailClass->setBody(getHtmlBody($subject,$body,$email,$name,$phone,$country));
$emailClass->setReplyToMailEmail($email);
$emailClass->setReplyToMailName($name);
$emailClass->addCcAddress('lahiru@matalacinnamon.com','Lahiru Fernando');

if($emailClass->send()){
    ResponseHelper::respond(200,'Sent OK',$errors);
}else{
    ResponseHelper::respond(500,'Server Error',$errors);
}

function getHtmlBody($subject,$body,$email,$name,$phone,$country){
    $timenow = date('Y-m-d H:i:s');
    $tmpl = "
    <span>Hi,</span> <br>
    <h4>$subject</h4
    <br>
    <h5>Message</h5>
    <p>$body</p>
    <br>
    <b> Name : $name</span>
    <br>
    <b> Email : $email</span>
    <br>
    <b> Phone  : </b> $phone
    <br>
    <b> Country : </b> $country
    <br>
    <hr>
        Sent at : $timenow;
    <hr>
    ";
    return $tmpl;
}

function getTextBody($subject,$body,$email,$name,$phone,$country){
    $timenow = date('Y-m-d H:i:s');
    $text = "
        Subject - $subject \n
        -------------------------------------------- \n
        Message - $body \n
        
        Email - $name ($email) \n
        
        Phone - $phone  \n
        
        Country - $country \n
        
        -------------------------------------------- \n
        
        Sent At ($timenow)
       
       
    ";
    return $text;
}

// Function to get the user IP address
function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}