<?php

namespace Jbakhtin\SlackMessageBuilder;

use GuzzleHttp\Client as Guzzle;
use Jbakhtin\SlackMessageBuilder\Blocks\Block;

class Message {
    //TODO: need replaceto private
    public $text;
    public $token;
    public $channel;

    public $blocks;

    public $guzzle;

    public function __construct() {
		$this->guzzle = new Guzzle();
	}

	/** Send message
	 *
	 * @return \Psr\Http\Message\StreamInterface
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	function send()
    {
		$response = $this->guzzle->post("https://slack.com/api/chat.postMessage", ['form_params' => get_object_vars($this)]);

        return $response;
    }

	/** Set token
	 *
	 * Authentication token define work space where will be sand message.
	 *
	 * How it will be look:
	 *  {
	 *      "token": "token"
	 *      "text": ...,
	 *      "blocks": ...,
	 *      ...
	 *  }
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
     * How it will be look:
     *  {
     *      "token": "..."
     *      "text": "Hello, World!",
     *      "blocks": [{...}],
     *      ...
     *  }
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
	 * How it will be look:
	 *  {
	 *      "token": "..."
	 *      "text": "...",
	 *      "blocks": [
	 *          {
	 *              "type":"section",
	 *              "text": {
	 *                  "type": "mrkdwn",
	 *                  "text": "Jurij Bakhtin sat text block with type 'mark down'"
	 *              }
	 *          }
	 *      ],
	 *      ...
	 *  }
	 *
	 * @param Block $block
	 * @return $this
	 */
    public function setBlock(Block $block) : Message
    {
        $this->blocks[] = $block;
        return $this;
    }

    function getArray() : array
    {
        return get_defined_vars($this);
    }
}