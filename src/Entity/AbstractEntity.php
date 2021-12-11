<?php

namespace Entity;

class AbstractEntity
{
    private int $id;

    final public function getId(): int
    {
        return $this->id;
    }

    final public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

}
