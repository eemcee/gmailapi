<?php
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
require_once 'config.php';
 
try {
    $adapter->authenticate();
    $token = $adapter->getAccessToken();
    $db = new DB();
    $db->update_access_token(json_encode($token));
    // echo "Access token inserted successfully.";

    $db = new DB();
    $arr_token = (array) $db->get_access_token();

    $transport = Transport::fromDsn('gmail+smtp://'.urlencode('mccabullos@gmail.com').':'.urlencode($arr_token['access_token']).'@default');
 
    $mailer = new Mailer($transport);

    $message = (new Email())
        ->from('SENDER_NAME <mccabullos@gmail.com>')
        ->to('mccabullos@gmail.com')
        ->subject('Email through Gmail API')
        ->html('<h2>Email sent through Gmail API adasd</h2>');

    // Send the message
    $mailer->send($message);

    echo 'Email sent successfully.';
    
}
catch( Exception $e ){
    echo $e->getMessage() ;
}

    

?>
