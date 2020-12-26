<?php


namespace Jbakhtin\SlackMessageBuilder;


use GuzzleHttp\Client as GuzzleHttp;

class Client
{
    public $guzzle;
    public $message;

    public function __construct(Message $message) {
        $this->message = $message;
        $this->guzzle = new GuzzleHttp();
    }

    public function send() {
        return $this->guzzle->post("https://slack.com/api/chat.postMessage", ['form_params' => $this->message->getArray()]);
    }
}