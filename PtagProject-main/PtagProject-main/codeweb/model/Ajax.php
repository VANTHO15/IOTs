<?php
require_once 'Model.php';
$event = addslashes($_POST['event']);// mình gán nó vào biến event
$tagList = new TagList();
$Mcu = new Mcu();
$mcus= $Mcu->getMcuList();
if ($event == "load_tag_stt") {
	$thoigian = time();
	$dem = 0;
	foreach ($mcus as $mcu) {
		$denta_time = $thoigian - $mcu["mcu_lasttime"];
		if($denta_time < 5)
		{
			$return["mcu_stt_".$mcu["mcu_id"]] = 1;
			$dem = $dem + 1;
		}
		else {
			$return["mcu_stt_".$mcu["mcu_id"]] = 0;
			//if ($dem > 1) 
			//{
				//$dem = $dem - 1;
			//}
		}
	}
	$return["stt"] = 0;
	if ($dem > 0 ) {
		$return["stt"] = 1;
	}
	$tags = $tagList->getTagList();
	foreach ($tags as $tag) {
	    $return["tag_value1_".$tag["tag_id"]] = $tag["tag_value1"];
	}
}
else if ($event == "set_tag_stt") {
	$tag_id = addslashes($_POST['tag_id']);
	$tag_stt = addslashes($_POST['tag_value1']);
	$return["mess"] = $tagList->setTagValue1($tag_id,$tag_stt);
}
	
echo json_encode($return);
?>