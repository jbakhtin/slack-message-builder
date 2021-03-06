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
        return $this->guzzle->post("https://slack.com/api/chat.postMessage", [
        	'body' => json_encode($this->message->toArray(), JSON_UNESCAPED_UNICODE),
        	'headers' => [
				'Content-Type' => 'application/json;charset=UTF-8',
				'Authorization' => 'Bearer xoxb-1257257834017-1254207437045-iZqQgI50fjt2Io1SeIkuazn7'
			]
		]);
    }
}