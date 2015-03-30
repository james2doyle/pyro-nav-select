<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Navigation Assignment Field Type
 *
 * @package		Addons\Field Types
 * @author		WARPAINT Media (hello@warpaintmedia.ca)
 * @license		MIT License
 * @link			http://warpaintmedia.ca
 */
class Field_nav_select
{
	public $field_type_slug    = 'nav_select';
	public $db_col_type        = 'text';
	public $version            = '1.0.0';
	public $author             = array(
		'name'=>'WARPAINT Media',
		'url'=>'http://warpaintmedia.ca'
		);

	// --------------------------------------------------------------------------

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('navigation/navigation_m');
	}

	/**
	 * Output form input
	 *
	 * @param	array
	 * @param	array
	 * @return	string
	 */
	public function form_output($data, $entry_id, $field)
	{
		$values = array_for_select($this->CI->navigation_m->get_groups(), 'id', 'title');
		$dropdown = form_dropdown($data['form_slug'], array('-1' => 'None') + $values, $data['value']);
		return sprintf("<div id=\"%s_nav_select\" class=\"nav_select\">%s</div>", $data['form_slug'], $dropdown);
	}

	public function pre_output_plugin($value, $data)
	{
		$items = array_for_select($this->CI->navigation_m->get_groups(), 'id', 'title');
		$items_slugs = array_for_select($this->CI->navigation_m->get_groups(), 'id', 'abbrev');
		if (is_null($value) || $value == '-1') {
			return false;
		} else {
			return array(
			'id' => $value,
			'title' => $items[$value],
			'slug' => $items_slugs[$value]
			);
		}
	}

	public function event($field)
	{
		// $this->CI->type->add_js('nav_select', 'nav_select.js');
		// $this->CI->type->add_css('nav_select', 'nav_select.css');
	}
}
