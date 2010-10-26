<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package		Fuel
 * @version		1.0
 * @author		Dan Horrigan <http://dhorrigan.com>
 * @license		Apache License v2.0
 * @copyright	2010 Dan Horrigan
 */

class Fuel_Input {
	
	/**
	 * Get the real ip address of the user.  Even if they are using a proxy.
	 *
	 * @static
	 * @access	public
	 * @return	string
	 */
	public static function real_ip()
	{
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		elseif (isset($_SERVER['HTTP_CLIENT_IP']))
		{
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (isset($_SERVER['REMOTE_ADDR']))
		{
			return $_SERVER['REMOTE_ADDR'];
		}
	}

	/**
	 * Return's the protocol that the request was made with
	 *
	 * @access	public
	 * @return	string
	 */
	public static function protocol()
	{
		return ( ! empty($_SERVER['HTTPS'])) ? 'https' : 'http';
	}

	/**
	 * Return's whether this is an AJAX request or not
	 *
	 * @access	public
	 * @return	bool
	 */
	public static function is_ajax()
	{
		return ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'));
	}

	/**
	 * Return's the referrer
	 *
	 * @access	public
	 * @return	string
	 */
	public static function referrer()
	{
		return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
	}

	/**
	 * Return's the input method used (GET, POST, DELETE, etc.)
	 *
	 * @access	public
	 * @return	string
	 */
	public static function method()
	{
		return isset($_SERVER['REQUEST_METHOD']) ? strtoupper($_SERVER['REQUEST_METHOD']) : 'GET';
	}

	/**
	 * Return's the user agent
	 *
	 * @access	public
	 * @return	string
	 */
	public static function user_agent()
	{
		return isset($_SERVER['HTTP_USER_AGENT']) ? isset($_SERVER['HTTP_USER_AGENT']) : '';
	}

	/**
	* Fetch an item from the GET array
	*
	* @access	public
	* @param	string
	* @param	bool
	* @return	string
	*/
	public static function get($index = '')
	{
		return Input::_fetch_from_array($_GET, $index);
	}

	/**
	* Fetch an item from the POST array
	*
	* @access	public
	* @param	string
	* @param	bool
	* @return	string
	*/
	public static function post($index = '')
	{
		return Input::_fetch_from_array($_POST, $index);
	}

	/**
	* Fetch an item from the php://input for put arguments
	*
	* @access	public
	* @param	string
	* @param	bool
	* @return	string
	*/
	public static function put($index = '')
	{
		if (Input::method() !== 'PUT')
		{
			return NULL;
		}
		
		if ( ! isset($_PUT))
		{
			static $_PUT;
			parse_str(file_get_contents('php://input'), $_PUT);
		}

		return Input::_fetch_from_array($_PUT, $index);
	}

	/**
	* Fetch an item from the php://input for delete arguments
	*
	* @access	public
	* @param	string
	* @param	bool
	* @return	string
	*/
	public static function delete($index = '')
	{
		if (Input::method() !== 'DELETE')
		{
			return NULL;
		}

		if ( ! isset($_DELETE))
		{
			static $_DELETE;
			parse_str(file_get_contents('php://input'), $_DELETE);
		}

		return Input::_fetch_from_array($_DELETE, $index);
	}

	/**
	* Fetch an item from either the GET array or the POST
	*
	* @access	public
	* @param	string	The index key
	* @param	bool	XSS cleaning
	* @return	string
	*/
	public static function get_post($index = '')
	{
		return isset($_POST[$index]) ? Input::post($index) : Input::get($index);
	}

	/**
	* Fetch an item from the COOKIE array
	*
	* @access	public
	* @param	string
	* @param	bool
	* @return	string
	*/
	function cookie($index = '')
	{
		return Input::_fetch_from_array($_COOKIE, $index);
	}

	/**
	* Fetch an item from the SERVER array
	*
	* @access	public
	* @param	string
	* @param	bool
	* @return	string
	*/
	function server($index = '')
	{
		return Input::_fetch_from_array($_SERVER, $index);
	}

	/**
	* Fetch from array
	*
	* This is a helper function to retrieve values from global arrays
	*
	* @access	private
	* @param	array
	* @param	string
	* @param	bool
	* @return	string
	*/
	private function _fetch_from_array(&$array, $index = '')
	{
		if ( ! isset($array[$index])) return NULL;

		return $array[$index];
	}
	
}

/* End of file input.php */