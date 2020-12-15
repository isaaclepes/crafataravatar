<?php
/**
*
* Minecraft Avatar Extension - crafatar.net API
*
* @copyright (c) 2015 SiteSPlat <info@sitesplat.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace crafataravatar\crafatarphpbb\avatar\driver;

class minecraftcrafatar extends \phpbb\avatar\driver\driver
{
	const CRAFATAR_URL = 'https://crafatar.com/';

	public function get_data($row)
	{
		return array(
			'src'		=> $row['avatar'],
			'width'		=> $row['avatar_width'],
			'height'	=> $row['avatar_height'],
		);
	}

	public function get_custom_html($user, $row, $alt = '')
	{
		return '<img src="' . $this->get_crafatar_url($row) . '" ' .
			'alt="' . ((!empty($user->lang[$alt])) ? $user->lang[$alt] : $alt) . '" />';
	}

	public function prepare_form($request, $template, $user, $row, &$error)
	{
		$user->add_lang_ext('crafataravatar/crafatarphpbb', 'crafatar');

		list($row['avatar_username'], $row['avatar_options']) = json_decode($row['avatar'], true);

		$options = array('avatars', 'renders/head', 'renders/body');
		$options_html = '';
		foreach ($options as $value)
		{
			$selected = (isset($row['avatar_options']) && $value == $row['avatar_options']) ? ' selected="selected"' : '';
			$options_html .= '<option value="' . $value . '"' . $selected . '>' . $user->lang('CRAFATAR_OPTION_' . strtoupper($value)) . '</option>';
		}

		$template->assign_vars(array(
			'AVATAR_CRAFATAR_USERNAME'	=> (($row['avatar_type'] == $this->get_name() || $row['avatar_type'] == 'minecraftcrafatar') && $row['avatar_username']) ? $row['avatar_username'] : $request->variable('avatar_crafatar_username', ''),
			'AVATAR_CRAFATAR_OPTIONS'	=> $options_html,
		));

		return true;
	}

	public function prepare_form_acp($user)
	{
		$user->add_lang_ext('crafataravatar/crafatarphpbb', 'crafatar');

		return array(
			'allow_avatar_crafatar_on_registration'	=> array('lang' => 'AVATAR_CRAFATAR_ON_REGISTRATION', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
		);
	}

	public function process_form($request, $template, $user, $row, &$error)
	{
		global $config;

		$row['avatar_username'] = $request->variable('avatar_crafatar_username', '');
		$row['avatar_options'] = $request->variable('avatar_crafatar_options', 'avatar');

		return array(
			'avatar' => json_encode(array($row['avatar_username'], $row['avatar_options'])),
			'avatar_width' => $config['avatar_max_width'],
			'avatar_height' => $config['avatar_max_height'],
		);
	}

	public function get_template_name()
	{
		return '@crafataravatar_crafatarphpbb/ucp_avatar_options_crafatar.html';
	}

	public function get_acp_template_name()
	{
		return '@crafataravatar_crafatarphpbb/acp_avatar_options_crafatar.html';
	}

	protected function get_crafatar_url($row)
	{
		list($row['avatar_username'], $row['avatar_options']) = json_decode($row['avatar'], true);

		$url = self::CRAFATAR_URL;
		$url .=  $row['avatar_options'] . '/';
		$url .=  (isset($row['avatar_username']) && $row['avatar_username']) ? $row['avatar_username'] : '';
		if ($row['avatar_options'] != 'renders/body')
		{
			$url .= '?size=/' . $this->config['avatar_max_width'];
		}

		return $url;
	}
}
