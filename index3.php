<?php

/** Simple example of using TwigTemplateManager class **/

// load composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Service\TwigTemplateManager;

$template = new TwigTemplateManager(
    'order/order_ready.html',
    [
        'order_number' => '12345',
        'order_date' => new \DateTime()
    ]
);
$template->display();
