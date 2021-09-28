<?php

  require_once 'Model.php';
  $tagList = new TagList();
  $mcu = new Mcu();
  $thoigian = time();
  

  if ($_SERVER["REQUEST_METHOD"] == "GET") 
  {
    if (isset($_GET['api_key'])) 
    {
      $api_key = test_input($_GET["api_key"]);
      if( $mcu->checkKeyMcu($api_key) == $api_key) 
      {
        $mcu ->setTimeMcu($api_key,$thoigian);
        if (isset($_GET['sensor'])) 
        {
          $sensor = test_input($_GET["sensor"]);
          $tagList->setTagValue1(3,$sensor);
        }
      
        $tag_1_value1 = $tagList->getTagValue1("1");
        $tag_2_value1 = $tagList->getTagValue1("2");
        $return["t1"] = intval($tag_1_value1);
        $return["t2"] = intval($tag_2_value1);
        echo json_encode($return);
      }
      else 
      {
        echo "Sai mã khóa";
      }
    }
    else 
    {
      echo "Không có khóa";
    }
    
  }
  else {
    echo "Không có dữ liệu đầu vào!";
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>