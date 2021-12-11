<?php

namespace Entity;

use DateTime;

class Client extends AbstractEntity
{
    private string $civility;
    private string $firstname;
    private string $name;
    private string $email;
    private ?DateTime $dateAccountActivation = null;
    private ?DateTime $dateAccountSuspension = null;

    public function getCivility(): string
    {
        return $this->civility;
    }

    public function setCivility($civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateAccountActivation(): ?DateTime
    {
        return $this->dateAccountActivation;
    }

    public function setDateAccountActivation($dateAccountActivation): self
    {
        $this->dateAccountActivation = $dateAccountActivation;

        return $this;
    }

    public function getDateAccountSuspension(): ?DateTime
    {
        return $this->dateAccountSuspension;
    }

    public function setDateAccountSuspension($dateAccountSuspension): self
    {
        $this->dateAccountSuspension = $dateAccountSuspension;

        return $this;
    }
}
