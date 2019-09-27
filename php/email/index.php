<?php

/*
 * Eduardo Malherbi Martins (http://emalherbi.com/)
 * Copyright @emm
 * Full Stack Web Developer.
 */

require_once '../routes.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');
$app->get('/send/', function () {
    echo 'Send: Use method POST.';
});
$app->post('/send/', 'send');
$app->run();

function send()
{
    global $service;

    $request = \Slim\Slim::getInstance()->request();
    $item = json_decode($request->getBody());

    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = 'UTF-8';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';
        $mail->Host = 'smtp.domain.com';
        $mail->Username = 'username@domain.com';
        $mail->Password = 'password';

        $mail->From = $item->from->email;
        $mail->FromName = $item->from->name;

        foreach ($item->address as $values) {
            if (!empty($values->email) && !empty($values->name)) {
                $mail->AddAddress($values->email, $values->name);
            }
        }

        $mail->AddReplyTo($item->from->email, $item->from->name);

        $mail->WordWrap = 50;
        $mail->IsHTML(true);

        $mail->Subject = nl2br($item->title);
        $mail->Body = nl2br($item->msg);
        $mail->AltBody = '';

        $result = $mail->Send();
    } catch (Exception $e) {
        $result = $mail->ErrorInfo;
    }

    echo '{ "result" : '.json_encode($result).'}';
}
