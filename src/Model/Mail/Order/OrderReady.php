<?php

namespace Model\Mail\Order;

use \Entity\Order;
use \Model\Mail\Order\AbstractOrder;

final class OrderReady extends AbstractOrder
{
    public function returnTemplateFile(): string
    {
        return 'order/order_ready.html';
    }

    public function returnTitle(): string
    {
        /** @var Order $entity */
        $entity = $this->getEntity();

        return sprintf(
            'Commande "%s" prête',
            $entity->getReference()
        );
    }
}
