<?php

namespace Model\Mail;

use Entity\AbstractEntity;
use Model\Mail\AbstractMail;
use Model\Mail\AbstractMailTwig;
use Service\MailSender;
use Service\TwigTemplateManager;

/**
 * Class used to build instances
 */
final class MailFactory
{
    private AbstractMail $mailInstance;
    private MailSender $mailSender;
    private TwigTemplateManager $twigTemplateManager;

    /**
     * Create an instance corresponding to the computed instance class
     *
     * @param string $inputCreation
     * @return AbstractMail
     */
    public function create(string $mailClass, AbstractEntity $entity): AbstractMail
    {      
        $this->mailInstance = new $mailClass($entity);

        if ($this->mailInstance instanceof AbstractMailTwig) {
            /** @var AbstractMailTwig $instance  */
            $this->getMailInstance()->setContent($this->getTwigTemplateManager()->getRender());
        }

        return $this->getMailInstance();
    }

    private function getMailInstance(): AbstractMail
    {
        return $this->mailInstance;
    }

    private function getTwigTemplateManager(): TwigTemplateManager
    {
        if (empty($this->twigTemplateManager)) {
            $this->twigTemplateManager = new TwigTemplateManager($this->getMailInstance()->getTemplateFile(), $this->getMailInstance()->getBodyVariables());
        }
        return $this->twigTemplateManager;
    }

    public function getMailSender(): MailSender
    {
        if (empty($this->mailSender)) {
            $this->mailSender = new MailSender($this->getMailInstance());
        }
        return $this->mailSender;
    }
}
