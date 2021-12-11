<?php

// load composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Model\Client;
use Model\Order;
use Model\Mail\Client\AccountActivated;
use Model\Mail\Client\AccountSuspended;
use Model\Mail\Order\OrderReady;
use Model\Mail\Order\OrderCanceled;

class Index
{
    use \Trait\MailSenderTrait;

    public function sendMails()
    {
        // sending order emails
        $orderEntity = (new Order())->getById(123);
        $this->sendMail(OrderReady::class, $orderEntity);
        $this->sendMail(OrderCanceled::class, $orderEntity);

        // sending client emails
        $clientEntity = (new Client())->getById(1);
        $this->sendMail(AccountActivated::class, $clientEntity);
        $this->sendMail(AccountSuspended::class, $clientEntity);
    }
}

$index = new Index();
$index->sendMails();
