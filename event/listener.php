<?php
/**
*
* Minecraft Avatar Extension - minotar.net API
*
* @copyright (c) 2015 SiteSPlat <info@sitesplat.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace sitesplat\minecraftavatarminotar\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $user;
	protected $config;
	protected $request;
	protected $template;

	public function __construct(\phpbb\user $user, \phpbb\config\config $config, \phpbb\request\request $request, \phpbb\template\template $template)
	{
		$this->user = $user;
		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.ucp_register_data_before'		=> 'ucp_register_data_before',
			'core.ucp_register_user_row_after'	=> 'ucp_register_user_row_after',
		);
	}

	public function ucp_register_data_before($event)
	{
		if (!intval($this->config['allow_avatar_sitesplat\minecraftavatarminotar\avatar\driver\minecraftminotar']) || !intval($this->config['allow_avatar_minotar_on_registration']))
		{
			return;
		}

		$this->user->add_lang_ext('sitesplat/minecraftavatarminotar', 'minotar');

		$username = $this->request->variable('avatar_minotar_username', '');
		$options = $this->request->variable('avatar_minotar_options', '');

		$options_html = '';
		foreach (array('avatar', 'helm', 'skin') as $value)
		{
			$selected = ($value == $options) ? ' selected="selected"' : '';
			$options_html .= '<option value="' . $value . '"' . $selected . '>' . $this->user->lang('MINOTAR_OPTION_' . strtoupper($value)) . '</option>';
		}

		$event['data'] = array_merge($event['data'], array(
			'avatar_minotar_username'	=> $username,
			'avatar_minotar_options'	=> $options,
		));

		$this->template->assign_vars(array(
			'S_AVATAR_MINOTAR_REGISTRATION'	=> (int) $this->config['allow_avatar_minotar_on_registration'],
			'AVATAR_MINOTAR_USERNAME'	=> $username,
			'AVATAR_MINOTAR_OPTIONS'	=> $options_html,
		));
	}

	public function ucp_register_user_row_after($event)
	{
		if (!intval($this->config['allow_avatar_sitesplat\minecraftavatarminotar\avatar\driver\minecraftminotar']) || !intval($this->config['allow_avatar_minotar_on_registration']))
		{
			return;
		}

		$username = $this->request->variable('avatar_minotar_username', '');
		$options = $this->request->variable('avatar_minotar_options', '');

		if ($username != '')
		{
			$event['user_row'] = array_merge($event['user_row'], array(
				'user_avatar'		=> json_encode(array($username, $options)),
				'user_avatar_type'	=> 'sitesplat.minecraftavatarminotar.minecraftminotar',
			));
		}
	}
}
