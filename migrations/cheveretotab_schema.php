<?php
/**
*
* @package phpBB Extension - Chevereto tab on posting page
* @copyright (c) 2020 Communauté EzCom <https://www.ezcom-fr.com>
* @license GNU General Public License, version 2 (GPL-2.0-only)
*
*/

namespace ezcom\cheveretotab\migrations;

class cheveretotab_schema extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(

			// Add permissions
			array('permission.add', array('u_see_cheveretotab')),
			// Set permissions
			array('permission.permission_set', array('ADMINISTRATORS', 'u_see_cheveretotab', 'group')),
		);
	}

	public function revert_data()
	{
		return array(

			// Remove permissions
			array('permission.remove', array('u_see_cheveretotab')),
			// Unet permissions
			array('permission.permission_unset', array('ADMINISTRATORS', 'u_see_cheveretotab', 'group')),
		);
	}
}
