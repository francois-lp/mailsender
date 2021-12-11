<?php

namespace Model;

use DateTime;
use Entity\Order as OrderEntity;
use Model\Client as ClientModel;

class Order
{
    private ClientModel $clientModel;

    private function getClientModel(): ClientModel
    {
        if (empty($this->clientModel)) {
            $this->clientModel = new ClientModel();
        }

        return $this->clientModel;
    }

    public function getById(int $id): OrderEntity
    {
        // hard data for the example
        $order = new OrderEntity($id);
        $order->setReference('OD2021-0000' . $id);
        $order->setDate(new DateTime());
        $order->setClient($this->getClientModel()->getById(1));

        return $order;
    }
}
