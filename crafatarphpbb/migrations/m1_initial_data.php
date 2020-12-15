<?php
/**
*
* Minecraft Avatar Extension - crafatar.net API
*
* @copyright (c) 2015 SiteSPlat <info@sitesplat.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace crafataravatar\crafatarphpbb\migrations;

class m1_initial_data extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\gold');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('allow_avatar_crafataravatar\crafatarphpbb\avatar\driver\minecraftcrafatar', 1)),
			array('config.add', array('allow_avatar_crafatar_on_registration', 1)),
		);
	}
}
