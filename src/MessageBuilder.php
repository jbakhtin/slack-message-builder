<?php

namespace Jbakhtin\SlackMessageBuilder;

use Jbakhtin\SlackMessageBuilder\Blocks\Block;
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
	 * @param Block $block
	 * @return MessageBuilder
	 */
    public function setBlock(Block $block) : MessageBuilder
    {
		$this->message->setBlock($block);
		return $this;
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