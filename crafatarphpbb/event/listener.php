<?php
/**
*
* Minecraft Avatar Extension - crafatar.net API
*
* @copyright (c) 2015 SiteSPlat <info@sitesplat.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace crafataravatar\crafatarphpbb\event;

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
		if (!intval($this->config['allow_avatar_crafataravatar\crafatarphpbb\avatar\driver\minecraftcrafatar']) || !intval($this->config['allow_avatar_crafatar_on_registration']))
		{
			return;
		}

		$this->user->add_lang_ext('crafataravatar/crafatarphpbb', 'crafatar');

		$username = $this->request->variable('avatar_crafatar_username', '');
		$options = $this->request->variable('avatar_crafatar_options', '');

		$options_html = '';
		foreach (array('avatar', 'helm', 'skin') as $value)
		{
			$selected = ($value == $options) ? ' selected="selected"' : '';
			$options_html .= '<option value="' . $value . '"' . $selected . '>' . $this->user->lang('CRAFATAR_OPTION_' . strtoupper($value)) . '</option>';
		}

		$event['data'] = array_merge($event['data'], array(
			'avatar_crafatar_username'	=> $username,
			'avatar_crafatar_options'	=> $options,
		));

		$this->template->assign_vars(array(
			'S_AVATAR_CRAFATAR_REGISTRATION'	=> (int) $this->config['allow_avatar_crafatar_on_registration'],
			'AVATAR_CRAFATAR_USERNAME'	=> $username,
			'AVATAR_CRAFATAR_OPTIONS'	=> $options_html,
		));
	}

	public function ucp_register_user_row_after($event)
	{
		if (!intval($this->config['allow_avatar_crafataravatar\crafatarphpbb\avatar\driver\minecraftcrafatar']) || !intval($this->config['allow_avatar_crafatar_on_registration']))
		{
			return;
		}

		$username = $this->request->variable('avatar_crafatar_username', '');
		$options = $this->request->variable('avatar_crafatar_options', '');

		if ($username != '')
		{
			$event['user_row'] = array_merge($event['user_row'], array(
				'user_avatar'		=> json_encode(array($username, $options)),
				'user_avatar_type'	=> 'crafataravatar.crafatarphpbb.minecraftcrafatar',
			));
		}
	}
}
