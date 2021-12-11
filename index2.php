<?php

/** Simple example of using PHPMailer **/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP as SMTP;
use PHPMailer\PHPMailer\Exception as Exception;

// load composer's autoloader
require 'vendor/autoload.php';

// create an PHPMailer instance
$mail = new PHPMailer(true);

try {
    // configuration
    $mail->CharSet = 'UTF-8';
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // debug mode

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 1025;

    // recipients
    $recipients = array('dest1@test.com', 'dest2@test.com');
    foreach ($recipients as $email) {
        $mail->AddAddress($email);
    }
    $mail->addCC('dest3@test.com', 'Dest3');
    $mail->addBCC('dest4@test.com', 'Dest4');

    // sender
    $mail->setFrom('exp@test.com', 'François');

    // content
    $mail->Subject = 'Test envoi de mail';
    $mail->WordWrap = 50; // number of characters for automatic line fee
    $html_content = '<div><b>Lorem ipsum</b> dolor sit amet, consectetur adipiscing elit. Duis euismod, purus vel scelerisque cursus, arcu metus tempus dui, eu aliquet velit nisl eu eros. Nullam rhoncus eros non erat semper consequat. Curabitur ipsum metus, euismod sed ultricies ac, sodales convallis arcu. In porta sem orci, et cursus lectus laoreet quis. Etiam faucibus mollis convallis. Vestibulum suscipit, sapien non aliquam placerat, quam magna accumsan est, id interdum metus nisi nec leo. In maximus lacinia orci id tempor. Maecenas at pharetra est, vel sagittis dui. Curabitur erat dolor, varius ut fermentum et, pulvinar quis lorem. Mauris faucibus lacus eget magna facilisis iaculis vel quis arcu. Praesent convallis nisi eu magna dapibus feugiat. Cras rhoncus rhoncus libero, in pretium est ullamcorper non.</div>';
    $mail->IsHTML(true);
    $mail->MsgHTML($html_content);
    $mail->AltBody = strip_tags($html_content); // plain text

    // attachments
    $mail->AddAttachment('./data/PHP-logo.svg.png', 'php-logo.png');
    $mail->AddAttachment('./data/twig_cheat_sheet.pdf', 'twig.pdf');

    // sending
    if (!$mail->send()) {
        echo $mail->ErrorInfo;
    } else {
        $mail->SmtpClose();
        echo 'Message well sent';
    }
} catch (Exception) {
    echo "Message not sent. Error {$mail->ErrorInfo}";
}
