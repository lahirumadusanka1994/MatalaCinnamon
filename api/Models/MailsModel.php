<?php
include_once SITE_ROOT.'api/Models/BaseModel.php';

class MailsModel extends BaseModel
{
    public function __construct()
    {
        $tablename = 'mails';
        $primaryKey = 'id';

        parent::__construct($tablename, $primaryKey);
    }

    public $subject;
    public $body;
    public $email;
    public $name;
    public $ip;

    public function insert($subject,$body,$email,$name,$ip,$phone,$country){
        $insertData  = [
            'subject'=>StringHelper::safeString($subject),
            'message'=>StringHelper::safeString($body),
            'email'=>StringHelper::safeString($email),
            'name'=>StringHelper::safeString($name),
            'phone'=>StringHelper::safeString($phone),
            'country'=>StringHelper::safeString($country),
            'ip'=>StringHelper::safeString($ip)
        ];
       return $this->insertRec($insertData);
    }
}