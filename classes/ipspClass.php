<?php

class ipsp{

	public $db;
	public $psp;

	function __construct($db, $pid=NULL)
	{
		$this->db = $db;
		$this->pid = $pid;
	}

	function getList(&$list)
	{
		$sql = "select pid, p_brand, psp FROM ipsp WHERE active=true ORDER BY p_brand, priority";
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			extract($row);
			$list[$pid][$p_brand]=$psp;
		}
		mysql_free_result($rs);
	}

	function addNew($phrase, $p_brand)
	{
		$isql = "INSERT INTO ipsp (p_brand, psp) VALUES ($p_brand, '$phrase') ON DUPLICATE KEY UPDATE lastmod=NOW()";
		#echo "$isql\n";
		mysql_query($isql, $this->db->magic());
	}

	function getPhrase(&$phrase, $rnum)
	{
		$sql="SELECT pid, p_brand, progress, psp FROM ipsp WHERE active=true AND progress<>'0111' LIMIT $rnum,1";
		#echo "$sql \n";
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		#print_r($row) . "\n";
		extract($row);
		#$phrase[$pid][$p_brand][$progress]=$psp;
		$phrase=array($pid,$p_brand, $progress, $psp);
		mysql_free_result($rs);
	}

	function getcount()
	{
		$sql = "SELECT COUNT(pid) as pcount FROM ipsp WHERE active=true";
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		$retVal = $row["pcount"];
		mysql_free_result($rs);
		return $retVal;
	}
};// end class ipsp
