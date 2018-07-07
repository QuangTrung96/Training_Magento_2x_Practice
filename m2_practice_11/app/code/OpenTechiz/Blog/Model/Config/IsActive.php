<?php

namespace OpenTechiz\Blog\Model\Config;

use Magento\Framework\Option\ArrayInterface;

class IsActive implements ArrayInterface
{

	const ENABLED =1;
	const DISABLED = 0;

	public function toOptionArray() {
		return [
			self::ENABLED => __("Enabled"),
			self::DISABLED => __("Disabled")
		];
	}

}