<?php
/**
 *
 * @package Remove Most Online Extension
 * @copyright (c) 2021 david63
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace david63\removemostonline\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use phpbb\template\template;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var template */
	protected $template;

	/**
	 * Constructor for listener
	 *
	 * @param template          $template       Template object
	 *
	 * @access public
	 */
	public function __construct(template $template)
	{
		$this->template = $template;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	public static function getSubscribedEvents()
	{
		return [
			'core.page_header_after' => 'page_header_after',
		];
	}

	/**
	 * Update the template variables
	 *
	 * @param object $event The event object
	 * @return null
	 * @access public
	 */
	public function page_header_after($event)
	{
		$this->template->assign_var('RECORD_USERS', '');
	}
}
