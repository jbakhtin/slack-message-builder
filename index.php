<?php

@include "vendor/autoload.php";

use GuzzleHttp\Client as Guzzle;
use Jbakhtin\SlackMessageBuilder\Blocks\SectionBlock;
use Jbakhtin\SlackMessageBuilder\Message;
use Jbakhtin\SlackMessageBuilder\Pisces\Text;

$message = new Message();
try {
    $message->setText("Hello, World!")
        ->setToken('xoxb-1257257834017-1254207437045-iZqQgI50fjt2Io1SeIkuazn7')
        ->setChannel('#general');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
	echo json_encode($message->toArray());
	return;
}

$text = new Text("Hello, Block!");

$block = new SectionBlock($text);

$message->setBlock($block);

$client = new \Jbakhtin\SlackMessageBuilder\Client($message);

$response = $client->send();

echo json_encode($message->toArray());

