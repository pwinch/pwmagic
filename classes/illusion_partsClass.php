<?php
class Illusion_Parts{

	function __construct($db, $p_illusion=0)
	{
		$this->db = $db;
		$this->p_illusion = $p_illusion;
	}

	function getParts()
	{
		$sql = "SELECT ipid, part_name, levels FROM illusion_parts WHERE p_illusion=$this->p_illusion";
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			$retVal["part_name"][$row["ipid"]]=$row["part_name"];
			$retVal["level"][$row["ipid"]]=$row["levels"];
		}
		mysql_free_result($rs);
		return $retVal;
	}
	function updPart($p_illusion, $field, $value, $recnum)
	{
		#mail("p.winch@exteres.com",'Parts',print_r($_REQUEST,1));
		#echo print_r($_REQUEST,1);
		$sql = "INSERT INTO illusion_parts(ipid, part_name, p_illusion) VALUES ($recnum,'" . mysql_real_escape_string($value, $this->db->magic()) . "', $p_illusion) ON DUPLICATE  KEY UPDATE p_illusion=$p_illusion, part_name='" . mysql_real_escape_string($value, $this->db->magic()) . "', ipid=LAST_INSERT_ID(ipid)";
		mysql_query($sql, $this->db->magic());
		#mail("p.winch@exteres.com","ipsql",$sql);
                $result=mysql_query("SELECT LAST_INSERT_ID() iid", $this->db->magic());
                $rsrow=mysql_fetch_assoc($result);

		echo trim($rsrow["iid"]);

		mysql_free_result($rsrow);

	}
	function updLevel($p_illusion, $field, $value, $recnum, $state)
	{
		$level = pow(2,$value);
		if($state)
		{
			$sql = "INSERT INTO illusion_parts(ipid, levels, p_illusion) VALUES ($recnum, levels | $level, $p_illusion) ON DUPLICATE  KEY UPDATE p_illusion=$p_illusion, levels = (levels | $level) , ipid=LAST_INSERT_ID(ipid)";
		} else {
			$sql = "INSERT INTO illusion_parts(ipid, levels, p_illusion) VALUES ($recnum, levels & ~$level, $p_illusion) ON DUPLICATE  KEY UPDATE p_illusion=$p_illusion, levels = (levels & ~$level) , ipid=LAST_INSERT_ID(ipid)";
		}
		mysql_query($sql, $this->db->magic());
		#mail("p.winch@exteres.com","ipsql",$sql);
                $result=mysql_query("SELECT LAST_INSERT_ID() iid", $this->db->magic());
                $rsrow=mysql_fetch_assoc($result);

		echo trim($rsrow["iid"]);

		mysql_free_result($rsrow);
	}
}; // END Illusion_Parts
