<?php

namespace Jbakhtin\SlackMessageBuilder;

class Message {
    private $text;

    public function __construct()
    {
        $this->text = "Slack\n";
    }

    function send() : array
    {
        // TODO: Implement send() method.
    }

    public function setText(string $text) : Message
    {
        $this->text .=  "$text\n";
        return $this;
    }

    function getArray() : array
    {
        return get_defined_vars($this);
    }
}