<?php
/**
*
* Minecraft Avatar Extension - crafatar.net API
*
* @copyright (c) 2015 SiteSPlat <info@sitesplat.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ALLOW_CRAFATARAVATAR_CRAFATARPHPBB_AVATAR_DRIVER_MINECRAFTCRAFATAR'	=> 'Enable Minecraft avatars via Crafatar API',
	'AVATAR_CRAFATAR_ON_REGISTRATION'										=> 'Enable Minecraft avatars via Crafatar API on registration',

	'CRAFATARAVATAR_CRAFATARPHPBB_MINECRAFTCRAFATAR_TITLE'	            => 'Minecraft via Crafatar API',
	'CRAFATARAVATAR_CRAFATARPHPBB_MINECRAFTCRAFATAR_EXPLAIN'	            => 'Select the preferred options below',

	'CRAFATAR_AVATAR_NAME'	           => 'Minecraft UUID',
	'CRAFATAR_OPTIONS'		           => 'Type',
	'AVATAR_CRAFATAR_NAME_EXPLAIN'	   => 'Enter you Minecraft UUID (Check <a href="https://namemc.com/">namemc.com<br />to find your UUID</a>)',
	'AVATAR_CRAFATAR_OPTIONS_EXPLAIN'   => 'Select the type of avatar',
	
	'CRAFATAR_OPTION_AVATARS'	           => '2D Avatar',
	'CRAFATAR_OPTION_RENDERS/HEAD'	           => '3D Head',
	'CRAFATAR_OPTION_RENDERS/BODY'	           => '3D Body',

	'CRAFATAR_CRAFATARAVATAR'	               => 'Minecraft Crafatar Extension'
));
