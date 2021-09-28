<?php

require_once "views/View.php";
require_once "model/Model.php";
/**
 * xử lý trang chủ
 */
class Controller
{
	private $view;
	private $go = "";
	function __construct()
	{
		$this->view = new View();
		if (isset($_GET['go'])) {
			$this->go = $_GET['go'];
		}
		
		switch ($this->go) {
			case 'ptag':
				$this->ptagController();
				break;
			case null:
				$this->indexController();
				break;
			case "test":
				echo "tessss";
				break;
			case "pset":
				$this->psetController();	
				break;
			default:
				$this->p404Controller();
				break;
		}
		
	}

	public function ptagController()
	{
		$tagList = new TagList();
		$tags = $tagList->getTagList();
		$mcu = new Mcu();
		$mcus = $mcu->getMcuList();
		$this->view->ptagView("Trần Minh Thức","PEMY Internet Of Things","http://test.minhthuc.xyz",$tags,$mcus);
	}

	public function psetController()
	{
		$tagList = new TagList();
		$tags = $tagList->getTagList();
		$mcu = new Mcu();
		$mcus = $mcu->getMcuList();
		$this->view->psetView("Trần Minh Thức","PEMY Internet Of Things","http://test.minhthuc.xyz",$tags,$mcus);
	}

	public function indexController()
	{
		$mcu = new Mcu();
		$mcus = $mcu->getMcuList();
		print_r($mcus);

	}

	public function p404Controller()
	{
	    header("Location: 404");
		exit;
	}


}
?>