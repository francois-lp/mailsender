<?php

namespace Service;

use Model\Mail\AbstractMail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP as SMTP;
use PHPMailer\PHPMailer\Exception as Exception;

final class MailSender
{
    private $mail;

    public function __construct(AbstractMail $mail)
    {
        try {
            $this->mail = new PHPMailer(true);
            $this->setConfig()
                ->setTitle($mail->getTitle())
                ->setSender($mail->getSender())
                ->setRecipients($mail->getRecipients())
                ->setContent($mail->getContent())
                ->setAttachments($mail->getAttachments());
        } catch (Exception) {
            echo 'Mail construction error';
        }
    }

    public function setConfig(): self
    {
        // configuration
        $this->mail->CharSet = 'UTF-8';
        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER; // debug mode

        // SMTP configuration
        $this->mail->isSMTP();
        $this->mail->Host = 'localhost';
        $this->mail->Port = 1025;

        // content display
        $this->mail->WordWrap = 50; // number of characters for automatic line fee

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->mail->Subject = $title;

        return $this;
    }

    public function setSender(array $sender): self
    {
        $this->mail->setFrom($sender[0], $sender[1]);

        return $this;
    }

    public function setRecipients($recipients): self
    {
        foreach ($recipients as $recipient) {
            $this->mail->AddAddress($recipient[0], $recipient[1]);
        }

        //$this->mail->addCC('dest3@test.com', 'Dest3');
        //$this->mail->addBCC('dest4@test.com', 'Dest4');

        return $this;
    }

    public function setContent(string $htmlContent): self
    {
        $this->mail->IsHTML(true);
        $this->mail->MsgHTML($htmlContent);
        $this->mail->AltBody = strip_tags($htmlContent); // plain text

        return $this;
    }

    public function setAttachments(array $attachments): self
    {
        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                $this->mail->AddAttachment($attachment[0], $attachment[1]);
            }
        }

        return $this;
    }

    public function send()
    {
        try {
            if (!$this->mail->send()) {
                echo $this->mail->ErrorInfo;
            } else {
                $this->mail->SmtpClose();
                echo 'Message "' . $this->mail->Subject . '" well sent<br/>';
            }
        } catch (Exception) {
            echo 'Mail sending error<br/>';
        }
    }
}
