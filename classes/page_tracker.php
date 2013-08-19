<?php
class PTracker{

	function __construct($db)
	{
		$this->db = $db;
	}

	function getPage()
	{
		$page=explode('/',$_SERVER["PHP_SELF"]);
		$pageref="main";
		#echo $_SERVER["PHP_SELF"] . "<br />";
		#print_r($page) . "<br />";
		#echo $page[1] . ": " .count(explode('.',$page[1])) . "<br />";
		if(count(explode('.',$page[1]))!=2)
       	 	$pageref=$page[1];
		#echo "$pageref<br />";
		return $pageref;
	}

	function report()
	{
		$page = $this->getPage();
		$IP=$_SERVER["REMOTE_ADDR"];
		$isql = "INSERT INTO pwmagic.page_tracker VALUES (NULL,'$IP',NULL,NOW(),'{$_SERVER["HTTP_REFERER"]}','$page','" . mysql_real_escape_string($_SERVER["HTTP_USER_AGENT"]) . "')";
	#	echo "$isql\n";
		mysql_query($isql, $this->db->magic()); 
	}
};
?>
