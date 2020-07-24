<?php

namespace Source\Core;

class Message
{
    private $text;
    private $type;

    /**
     * @return string
     */ 
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */ 
    public function getType(): string
    {
        return $this->type;
    }

    public function success(string $message)
    {
        $this->type = CONF_MESSAGE_SUCCESS;
        $this->text = $this->filter($message);

        return $this;
    }

    private function filter($message)
    {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}