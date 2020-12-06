<?php
/**
*
* @package phpBB Extension - Chevereto tab on posting page
* @copyright (c) 2020 Communauté EzCom <https://www.ezcom-fr.com>
* @license GNU General Public License, version 2 (GPL-2.0-only)
*
*/

namespace ezcom\cheveretotab\migrations;

class cheveretotab_data_ucp extends \phpbb\db\migration\migration
{
	public function update_schema()
	{
		return array(
			'add_columns' => array(
				$this->table_prefix . 'users' => array(
					'user_show_cheveretotab' => array('BOOL', 1),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns' => array(
				$this->table_prefix . 'users' => array(
					'user_show_cheveretotab',
				),
			),
		);
	}
}
