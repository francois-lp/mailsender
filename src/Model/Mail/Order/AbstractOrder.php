<?php

namespace Model\Mail\Order;

use \Entity\Order;
use \Model\Mail\AbstractMailTwig;

abstract class AbstractOrder extends AbstractMailTwig
{
    public function returnBodyVariables(): array
    {
        /** @var Order $entity */
        $entity = $this->getEntity();

        return array(
            'order_number' => $entity->getReference(),
            'order_date' => $entity->getDate(),
            'recipient' => $entity->getClient()
        );
    }

    public function returnRecipients(): array
    {
        /** @var Order $entity */
        $entity = $this->getEntity();

        return array(
            array(
                $entity->getClient()->getEmail(),
                $entity->getClient()->getFirstname() . ' ' . $entity->getClient()->getName()
            )
        );
    }

    public function returnAttachments(): array
    {
        // hard data for the example
        return array(
            array('./data/PHP-logo.svg.png', 'php-logo.png'),
            array('./data/twig_cheat_sheet.pdf', 'twig.pdf'),
        );
    }
}
