<?php

namespace Entity;

use DateTime;
use Entity\Client;

class Order extends AbstractEntity
{
    private string $reference;
    private DateTime $date;
    private Client $client;

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference($reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient($client): self
    {
        $this->client = $client;

        return $this;
    }
}
