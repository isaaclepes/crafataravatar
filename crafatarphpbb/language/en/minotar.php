<?php
/**
*
* Minecraft Avatar Extension - minotar.net API
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
	'ALLOW_SITESPLAT_MINECRAFTAVATARMINOTAR_AVATAR_DRIVER_MINECRAFTMINOTAR'	=> 'Enable Minecraft avatars via Crafatar API',
	'AVATAR_MINOTAR_ON_REGISTRATION'										=> 'Enable Minecraft avatars via Crafatar API on registration',

	'SITESPLAT_MINECRAFTAVATARMINOTAR_MINECRAFTMINOTAR_TITLE'	            => 'Minecraft via Crafatar API',
	'SITESPLAT_MINECRAFTAVATARMINOTAR_MINECRAFTMINOTAR_EXPLAIN'	            => 'Select the preferred options below',

	'MINOTAR_AVATAR_NAME'	           => 'Minecraft UUID',
	'MINOTAR_OPTIONS'		           => 'Type',
	'AVATAR_MINOTAR_NAME_EXPLAIN'	   => 'Enter you Minecraft UUID',
	'AVATAR_MINOTAR_OPTIONS_EXPLAIN'   => 'Select the type of avatar',
	
	'MINOTAR_OPTION_AVATARS'	           => '2D Avatar',
	'MINOTAR_OPTION_RENDERS/HEAD'	           => '3D Head',
	'MINOTAR_OPTION_RENDERS/BODY'	           => '3D Body',

	'MINOTAR_SITESPLAT'	               => 'Crafatarphpbb Extension for Minecraft Avatars'
));
