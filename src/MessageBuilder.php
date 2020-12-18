<?php

namespace Jbakhtin\SlackMessageBuilder;

use Jbakhtin\SlackMessageBuilder\Message;

class MessageBuilder {
    protected $message;

    function __construct() {
        $this->message = new Message();
    }

    /** Set text block
     * @param $text
     * @return $this
     */
    function setText($text) : MessageBuilder
    {
        $this->message->setText($text);
        return $this;
    }

    /**
     * @return MessageBuilder
     */
    public function setBlock(Block $block) : MessageBuilder
    {

    }

    /** Get final message
     *
     * @return \Jbakhtin\SlackMessageBuilder\Message
     */
    function getMessage() : Message
    {
        return $this->message;
    }
}