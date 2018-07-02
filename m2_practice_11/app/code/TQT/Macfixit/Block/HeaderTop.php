<?php

namespace TQT\Macfixit\Block;

class HeaderTop extends \Magento\Framework\View\Element\Template
{

	protected function _beforeToHtml() {
		$config = $this->_scopeConfig;
		$phone = $config->getValue('general/store_information/phone');
		$email = $config->getValue('trans_email/ident_general/email');
		$facebook = $config->getValue('social/social_config/facebook');
		$twitter = $config->getValue('social/social_config/twitter');
		$this->assign('store_phone', $phone);
		$this->assign('store_email', $email);
		$this->assign('store_facebook', $facebook);
		$this->assign('store_twitter', $twitter);
		parent::_beforeToHtml();
	}
}