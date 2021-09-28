<?php

/**
 * 
 */
class TagList
{
	public $servername = 'localhost';
	public $username = 'root';
	public $dbname = 'pemytech';
	public $password = '12345';

	function __construct()
	{
		# code...
	}

	public function getTagList()
	{

		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query('SELECT * FROM mt_tag');
		$sql->close();
		$tags = array();
		if ($result->num_rows > 0) {
			while ($tag = $result->fetch_assoc()) {
			    $tags[] = $tag;
			}
		}
		return $tags;
	}

	public function getTagValue1($tag_id)
	{

		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("SELECT * FROM mt_tag WHERE tag_id = '$tag_id'");
		$sql->close();
		$value = "";
		if ($result->num_rows > 0) {
			while ($tag = $result->fetch_assoc()) {
			    $value = $tag["tag_value1"];
			}
		}
		return $value;
	}

	public function getTimeMcu($mcu_key)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("SELECT * FROM mt_mcu WHERE mcu_key='$mcu_key'");
		$sql->close();
		if ($result->num_rows > 0) {
			while ($mcu = $result->fetch_assoc()) {
			    $mcu_time = $mcu["mcu_lasttime"];
			}
		}

		return $mcu_time;

	}

	public function checkKeyMcu($mcu_key)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("SELECT * FROM mt_mcu WHERE mcu_key='$mcu_key'");
		$sql->close();
		if ($result->num_rows > 0) {
			while ($mcu = $result->fetch_assoc()) {
			    $rs = $mcu["mcu_key"];
			}
		}

		return $rs;

	}

	public function setTimeMcu($mcu_key, $mcu_time)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("UPDATE mt_mcu SET mcu_lasttime='$mcu_time' WHERE mcu_key='$mcu_key'");
		$sql->close();
		return $result;
	}

	public function setTagValue1($tag_id, $tag_stt)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("UPDATE mt_tag SET tag_value1='$tag_stt' WHERE tag_id='$tag_id'");
		$sql->close();
		return $result;
	}

	public function deleteTag($tag_id)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("UPDATE mt_tag SET tag_value1='$tag_stt' WHERE tag_id='$tag_id'");
		$sql->close();
		return $result;
	}
}


class Mcu
{
	public $servername = 'localhost';
	public $username = 'root';
	public $dbname = 'pemytech';
	public $password = '12345';

	function __construct()
	{
		# code...
	}

	public function getMcuList()
	{

		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query('SELECT * FROM mt_mcu');
		$sql->close();
		$mcus = array();
		if ($result->num_rows > 0) {
			while ($mcu = $result->fetch_assoc()) {
			    $mcus[] = $mcu;
			}
		}
		return $mcus;
	}

	public function getTimeMcu($mcu_key)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("SELECT * FROM mt_mcu WHERE mcu_key='$mcu_key'");
		$sql->close();
		if ($result->num_rows > 0) {
			while ($mcu = $result->fetch_assoc()) {
			    $mcu_time = $mcu["mcu_lasttime"];
			}
		}

		return $mcu_time;

	}

	public function checkKeyMcu($mcu_key)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("SELECT * FROM mt_mcu WHERE mcu_key='$mcu_key'");
		$sql->close();
		if ($result->num_rows > 0) {
			while ($mcu = $result->fetch_assoc()) {
			    $rs = $mcu["mcu_key"];
			}
		}
		else {
			$rs = 0;
		}

		return $rs;

	}

	public function setTimeMcu($mcu_key, $mcu_time)
	{
		$sql = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		$result = $sql->query("UPDATE mt_mcu SET mcu_lasttime='$mcu_time' WHERE mcu_key='$mcu_key'");
		$sql->close();
		return $result;
	}

}
?>