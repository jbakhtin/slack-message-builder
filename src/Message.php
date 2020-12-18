<?php

namespace Jbakhtin\SlackMessageBuilder;

use Jbakhtin\SlackMessageBuilder\Blocks\Block;

class Message {
    //TODO: need replaceto private
    public $text;
    public $blocks;

    public function __construct()
    {
        $this->text = "Slack\n";
    }

    function send() : array
    {
        $response = [
            'success' => 'ok',
            'payload' => "Hello, World!"
        ];

        return $response;
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
        $this->text .=  "$text\n";
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
     * @param string $text
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