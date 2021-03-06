<?php


namespace Jbakhtin\SlackMessageBuilder\Pisces;


class Text
{
	public $text;
	public $type;
	public $emoji;

	public function __construct(string $text = null, string $type = "mrkdwn", $emoji = null)
	{
		$this->text = $text;
		$this->type =  $type;
		$this->emoji = $emoji;
	}

	public function setText(string $text)
	{
		$this->text = $text;
	}

	public function markdwn()
	{
		$this->type = "mrkdwn";
	}

	public function plainText()
	{
		$this->type = "plain_text";
	}

	public function emoji()
	{
		$this->emoji = true;
	}

	public function toArray()
	{
		$attributes = get_object_vars($this);

		foreach($attributes as $key => $attribute) {
			if (is_null($attribute)) unset($attributes[$key]);
		}

		return $attributes;
	}
}