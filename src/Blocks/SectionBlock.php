<?php


namespace Jbakhtin\SlackMessageBuilder\Blocks;


use Jbakhtin\SlackMessageBuilder\Pisces\Text;

class SectionBlock extends Block
{
	public function __construct(Text $text)
	{
		$this->type = "section";
		$this->text = $text->toArray();
	}

	public function setText(Text $text)
	{
		$this->text = $text->toArray();
	}

	public function removeText()
	{
		$this->text = null;
	}
}