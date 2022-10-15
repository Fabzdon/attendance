<?php


require 'vendor/autoload.php';
?>

<?php

class SendEmail{
    public static function SendMail($to,$subject,$content){
    $key = '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';

 

    $email = new SendGrid\Mail\Mail();
    $email->setFrom("fabianngordon@gmail.com", "Fabian Gordon");
    $email->setSubject($subject);
    $email->addTo($to);
    $email->addContent("text/plain", $content );

    $sendgrid = new \SendGrid($key);
    try{
        $response = $sendgrid->send($email);
        return $response;
    

    }catch(Exception $e){
        echo'Caught Exception: '. $e->getMessage() . "\n";
        return false;
    }


    }
}

?>