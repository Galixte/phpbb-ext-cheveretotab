<?php
/**
*
* @package phpBB Extension - Chevereto tab on posting page
* @copyright (c) 2020 Communauté EzCom <https://www.ezcom-fr.com>
* @license GNU General Public License, version 2 (GPL-2.0-only)
*
*/

namespace ezcom\cheveretotab\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\request\request_interface */
	protected $request;

	/**
	* Constructor
	*
	* @param \phpbb\auth\auth					$auth			Auth object
	* @param \phpbb\config\config				$config			Config Object
	* @param \phpbb\template\template			$template		Template object
	* @param \phpbb\user						$user			User Object
	* @param \phpbb\request\request_interface	$request		Request Object
	*
	*/
	public function __construct(
		\phpbb\auth\auth $auth,
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\user $user,
		\phpbb\request\request_interface $request
	)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
		$this->request = $request;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.permissions'		=> 'add_permission',
			'core.page_header'		=> 'page_header',

			// UCP listeners
			'core.ucp_prefs_personal_data'			=> 'ucp_prefs_personal_data',
			'core.ucp_prefs_personal_update_data'	=> 'ucp_prefs_personal_update_data',
			'core.ucp_prefs_modify_common'			=> 'ucp_prefs_modify_common',
		);
	}

    public function add_permission($event)
    {
        $permis = $event['permissions'];
        $permis['u_see_cheveretotab'] = array('lang' => 'ACL_U_SEE_CHEVERETOTAB', 'cat' => 'misc');
        $event['permissions'] = $permis;
    }

	public function page_header($event)
	{
		$this->user->add_lang_ext('ezcom/cheveretotab', 'common');
		$this->template->assign_var('S_SEE_CHEVERETOTAB', $this->auth->acl_get('u_see_cheveretotab') && $this->user->data['user_show_cheveretotab']);
	}

	public function ucp_prefs_personal_data($event)
	{
		$event['data'] = array_merge($event['data'], array(
			'user_show_cheveretotab' => $this->request->variable('user_show_cheveretotab', (bool) $this->user->data['user_show_cheveretotab'])
		));
	}

	public function ucp_prefs_personal_update_data($event)
	{
		$event['sql_ary'] = array_merge($event['sql_ary'], array(
			'user_show_cheveretotab' => $event['data']['user_show_cheveretotab'],
		));
	}

	public function ucp_prefs_modify_common($event)
	{
		$this->template->assign_var('S_USER_SHOW_CHEVERETOTAB', $event['data']['user_show_cheveretotab']);
	}
}
