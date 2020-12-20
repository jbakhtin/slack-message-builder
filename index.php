<?php

@include "vendor/autoload.php";

use Jbakhtin\SlackMessageBuilder\Message;
use Jbakhtin\SlackMessageBuilder\Blocks\Block;

$message = new Message();
$response = $message->setText("Hello, World!")->send();

var_dump($response);
