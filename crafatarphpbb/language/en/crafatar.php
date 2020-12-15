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
	'ALLOW_CRAFATARAVATAR_MINECRAFTAVATARCRAFATAR_AVATAR_DRIVER_MINECRAFTCRAFATAR'	=> 'Enable Minecraft avatars via Minotar API',
	'AVATAR_CRAFATAR_ON_REGISTRATION'										=> 'Enable Minecraft avatars via Minotar API on registration',

	'CRAFATARAVATAR_MINECRAFTAVATARCRAFATAR_MINECRAFTCRAFATAR_TITLE'	            => 'Minecraft via Minotar API',
	'CRAFATARAVATAR_MINECRAFTAVATARCRAFATAR_MINECRAFTCRAFATAR_EXPLAIN'	            => 'Select the preferred options below',

	'CRAFATAR_AVATAR_NAME'	           => 'Minecraft Username',
	'CRAFATAR_OPTIONS'		           => 'Type',
	'AVATAR_CRAFATAR_NAME_EXPLAIN'	   => 'Enter you Minecraft username',
	'AVATAR_CRAFATAR_OPTIONS_EXPLAIN'   => 'Select the type of avatar',
	
	'CRAFATAR_OPTION_AVATARS'	           => '2D Avatar',
	'CRAFATAR_OPTION_RENDERS/HEAD'	           => '3D Head',
	'CRAFATAR_OPTION_RENDERS/BODY'	           => '3D Body',

	'CRAFATAR_CRAFATARAVATAR'	               => 'Minecraft Minotar Extension by <a href="http://www.sitesplat.com"><strong>SiteSplat.com</strong> <img class="decoded" alt="http://www.sitesplat.com" src="https://crafatar.net/avatar/clone1018/24.png"></a>'
));
