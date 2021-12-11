<?php

namespace Model\Mail;

use Entity\AbstractEntity;

abstract class AbstractMail
{
    const SITE_NAME = 'Monsite.fr';
    const SENDER_EMAIL = 'contact@monsite.fr';

    private AbstractEntity $entity;
    private string $title = '';
    private array $sender = array(self::SENDER_EMAIL, self::SITE_NAME);
    private array $recipients = array();
    private array $recipientsCC = array();
    private array $recipientsBCC = array();
    private array $bodyVariables = array();
    private string $templateFile = '';
    private string $content = '';
    private array $attachments = array();
    
    abstract public function returnTitle(): string;
    abstract public function returnRecipients(): array;
    abstract public function returnBodyVariables(): array;
    abstract public function returnTemplateFile(): string;

    function __construct(AbstractEntity $entity)
    {
        $this->setEntity($entity)
            ->setTitle(self::SITE_NAME .' - '. $this->returnTitle())
            ->setSender($this->returnSender())
            ->setRecipients($this->returnRecipients())
            ->setBodyVariables($this->returnBodyVariables())
            ->setTemplateFile($this->returnTemplateFile())
            ->setAttachments($this->returnAttachments());
    }

    public function getEntity(): AbstractEntity
    {
        return $this->entity;
    }

    public function setEntity(AbstractEntity $entity)
    {
        $this->entity = $entity;

        return $this;
    }
    public function returnSender(): array
    {
        return $this->sender;
    }
    public function returnRecipientsCC(): array
    {
        return $this->recipientsCC;
    }
    public function returnRecipientsBCC(): array
    {
        return $this->recipientsBCC;
    }
    public function returnContent(): string
    {
        return $this->content;
    }
    public function returnAttachments(): array
    {
        return $this->attachments;
    }

    final public function getTitle(): string
    {
        return $this->title;
    }

    final public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    final public function getSender(): array
    {
        return $this->sender;
    }

    final public function setSender($sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    final public function getRecipients(): array
    {
        return $this->recipients;
    }

    final public function setRecipients($recipients): self
    {
        $this->recipients = $recipients;

        return $this;
    }

    final public function getRecipientsCC(): array
    {
        return $this->recipientsCC;
    }

    final public function setRecipientsCC($recipientsCC): self
    {
        $this->recipientsCC = $recipientsCC;

        return $this;
    }

    final public function getRecipientsBCC(): array
    {
        return $this->recipientsBCC;
    }

    final public function setRecipientsBCC($recipientsBCC): self
    {
        $this->recipientsBCC = $recipientsBCC;

        return $this;
    }

    final public function getBodyVariables(): array
    {
        return $this->bodyVariables;
    }

    final public function setBodyVariables($bodyVariables): self
    {
        $this->bodyVariables = $bodyVariables;

        return $this;
    }

    final public function getTemplateFile(): string
    {
        return $this->templateFile;
    }

    final public function setTemplateFile($templateFile): self
    {
        $this->templateFile = $templateFile;

        return $this;
    }

    final public function getContent(): string
    {
        return $this->content;
    }

    final public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    final public function getAttachments(): array
    {
        return $this->attachments;
    }

    final public function setAttachments($attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }
}
