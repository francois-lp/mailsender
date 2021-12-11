<?php

namespace Model\Mail\Client;

use \Entity\Client;
use \Model\Mail\AbstractMailTwig;

abstract class AbstractClient extends AbstractMailTwig
{
    public function returnBodyVariables(): array
    {
        /** @var Client $entity */
        $entity = $this->getEntity();

        return array(
            'recipient' => $entity
            
        );
    }

    public function returnRecipients(): array
    {
        /** @var Client $entity */
        $entity = $this->getEntity();

        return array(
            array(
                $entity->getEmail(),
                $entity->getFirstname() . ' ' . $entity->getName()
            )
        );
    }
}
