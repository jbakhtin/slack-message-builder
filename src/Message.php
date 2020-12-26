<?php

namespace Jbakhtin\SlackMessageBuilder;

use GuzzleHttp\Client as Guzzle;
use Jbakhtin\SlackMessageBuilder\Blocks\Block;
use Psr\Http\Message\ResponseInterface;

class Message {
    //TODO: need replaceto private
    private $text;
    private $token;
    private $channel;

    private $blocks;

	/** Set token
	 *
	 * Authentication token define work space where will be sand message.
	 *
	 * @param string $token
	 * @return $this
	 */
	public function setToken(string $token) : Message
	{
		$this->token = $token;
		return $this;
	}

    /** Set text
     *
     * This field responsible for display text on popup.
     * Also, if "blocks" field is empty, then text will be displayed as main message.
     *
     * @param string $text
     * @return $this
     */
    public function setText(string $text) : Message
    {
        $this->text = $text;
        return $this;
    }

	/** Set block
	 *
	 * This field responsible for set any blocks to "blocks" field
	 *
	 * @param Block $block
	 * @return $this
	 */
    public function setBlock(Block $block) : Message
    {
        $this->blocks[] = $block;
        return $this;
    }

    /** Set channel name/id
     *
     * This field responsible for set channel by name or id
     *
     * @param string $channel
     * @return $this
     */
    public function setChannel(string $channel) : Message
    {
        $this->channel = $channel;
        return $this;
    }

    function getArray() : array
    {
        $attributes = get_object_vars($this);

        foreach($attributes as $key => $attribute) {
            if (is_null($attribute)) unset($attributes[$key]);
        }

        return $attributes;
    }
}