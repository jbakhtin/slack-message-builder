<?php

@include "vendor/autoload.php";

use GuzzleHttp\Client as Guzzle;
use Jbakhtin\SlackMessageBuilder\Message;
use Jbakhtin\SlackMessageBuilder\Blocks\Block;

$message = new Message();
try {
    $message->setText("Hello, World!")
        ->setToken('xoxb-1257257834017-1254207437045-Ky167BJLhFHWOYw5NurEARYy')
        ->setChannel('#general');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    return $e->getMessage();
}

//$block = new Block();

//$message->setBlock($block);

$client = new \Jbakhtin\SlackMessageBuilder\Client($message);

$response = $client->send();

