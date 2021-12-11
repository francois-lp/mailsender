<?php

namespace Model\Mail\Client;

use Model\Mail\Client\AbstractClient;

final class AccountActivated extends AbstractClient
{
    public function returnTemplateFile(): string
    {
        return 'client/account_activated.html';
    }

    public function returnTitle(): string
    {
        return 'Compte activé';
    }

    public function returnBodyVariables(): array
    {
        return array_merge(
            array('site' => self::SITE_NAME),
            parent::returnBodyVariables()
        );
    }
}
