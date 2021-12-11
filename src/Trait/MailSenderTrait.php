<?php

namespace Trait;

use Entity\AbstractEntity;
use Model\Mail\MailFactory;
use Service\MailSender;

trait MailSenderTrait {
    public function sendMail(string $mailClass, AbstractEntity $entity) {
        $mail = (new MailFactory())->create($mailClass, $entity);
        (new MailSender($mail))->send();
    }
}
