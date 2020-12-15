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
	'ALLOW_SITESPLAT_MINECRAFTAVATARMINOTAR_AVATAR_DRIVER_MINECRAFTMINOTAR'	=> 'Enable Minecraft avatars via Minotar API',
	'AVATAR_MINOTAR_ON_REGISTRATION'										=> 'Enable Minecraft avatars via Minotar API on registration',

	'SITESPLAT_MINECRAFTAVATARMINOTAR_MINECRAFTMINOTAR_TITLE'	            => 'Minecraft via Minotar API',
	'SITESPLAT_MINECRAFTAVATARMINOTAR_MINECRAFTMINOTAR_EXPLAIN'	            => 'Select the preferred options below',

	'MINOTAR_AVATAR_NAME'	           => 'Minecraft Username',
	'MINOTAR_OPTIONS'		           => 'Type',
	'AVATAR_MINOTAR_NAME_EXPLAIN'	   => 'Enter you Minecraft username',
	'AVATAR_MINOTAR_OPTIONS_EXPLAIN'   => 'Select the type of avatar',
	
	'MINOTAR_OPTION_AVATARS'	           => '2D Avatar',
	'MINOTAR_OPTION_RENDERS/HEAD'	           => '3D Head',
	'MINOTAR_OPTION_RENDERS/BODY'	           => '3D Body',

	'MINOTAR_SITESPLAT'	               => 'Minecraft Minotar Extension by <a href="http://www.sitesplat.com"><strong>SiteSplat.com</strong> <img class="decoded" alt="http://www.sitesplat.com" src="https://minotar.net/avatar/clone1018/24.png"></a>'
));
