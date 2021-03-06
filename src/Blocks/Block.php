<?php

namespace Jbakhtin\SlackMessageBuilder\Blocks;

class Block
{
	public function toArray()
	{
		$attributes = get_object_vars($this);

		foreach($attributes as $key => $attribute) {
			if (is_null($attribute)) unset($attributes[$key]);
		}

		return $attributes;
	}
}