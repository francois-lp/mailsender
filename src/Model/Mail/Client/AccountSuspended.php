<?php

namespace Model\Mail\Client;

use Model\Mail\Client\AbstractClient;

final class AccountSuspended extends AbstractClient
{
    public function returnTemplateFile(): string
    {
        return 'client/account_suspended.html';
    }

    public function returnTitle(): string
    {
        return 'Compte suspendu';
    }
}
