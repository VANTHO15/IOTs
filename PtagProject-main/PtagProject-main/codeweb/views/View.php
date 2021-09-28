<?php

/**
 * 
 */
class View
{
	
	function __construct()
	{
		# code...
	}

	public function ptagView($user_fullname,$title,$home_url,$tags, $mcus)
	{
		require_once 'template/v2/header.php';
		require_once 'template/v2/navleft.php';	
		require_once 'template/v2/main.php';
		require_once 'template/v2/footer.php';
	}

	public function psetView($user_fullname,$title,$home_url,$tags, $mcus)
	{
		require_once 'template/v2/header.php';
		require_once 'template/v2/navleft.php';	
		require_once 'template/v2/main_setting.php';
		require_once 'template/v2/footer_setting.php';
	}
}
?>