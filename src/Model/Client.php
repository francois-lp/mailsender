<?php

namespace Model;

use DateTime;
use Entity\Client as ClientEntity;

class Client
{
    public function getById(int $id): ClientEntity
    {
        // hard data for the example
        $client = new ClientEntity($id);
        $client->setCivility('Monsieur');
        $client->setFirstname('Michel');
        $client->setName('Martin');
        $client->setEmail('michel.martin@mail.com');
        $client->setDateAccountActivation(new DateTime('2021-01-01'));
        $client->setDateAccountSuspension(new DateTime('2021-12-31'));

        return $client;
    }
}
