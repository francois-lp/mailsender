<?php

namespace Model\Mail;

use Model\Mail\AbstractMail;

abstract class AbstractMailTwig extends AbstractMail
{
    const TEMPLATES_PATH = 'src\templates\mail';

    protected function getTemplatePath(): string
    {
        return self::TEMPLATES_PATH;
    }
}
