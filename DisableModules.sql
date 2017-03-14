UPDATE `core_config_data`
SET `value` = 1
WHERE
	`path` IN ('advanced/modules_disable_output/Mage_Authorizenet',
	'advanced/modules_disable_output/Mage_Bundle',
	'advanced/modules_disable_output/Mage_Centinel',
	'advanced/modules_disable_output/Mage_Downloadable',
	'advanced/modules_disable_output/Mage_GoogleCheckout',
	'advanced/modules_disable_output/Mage_PaypalUk',
	'advanced/modules_disable_output/Mage_Poll',
	'advanced/modules_disable_output/Mage_Rating',
	'advanced/modules_disable_output/Mage_Rss',
	'advanced/modules_disable_output/Mage_Sendfriend',
	'advanced/modules_disable_output/Mage_Usa',
	'advanced/modules_disable_output/Mage_Weee',
	'advanced/modules_disable_output/Mage_Wishlist',
	'advanced/modules_disable_output/Mage_XmlConnect',
	'advanced/modules_disable_output/Phoenix_Moneybookers');
