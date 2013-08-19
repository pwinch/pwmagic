<?php
class Illusions{

	public $db;

	function __construct($db)
	{
		$this->db = $db;
	}

	function getIllusions($filter=0)
	{
		$sql = "SELECT effect_name, iid FROM illusions WHERE b_active=true ORDER BY effect_name";
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			$retVal[$row["iid"]]=$row["effect_name"];
		}
		mysql_free_result($rs);
		return $retVal;
	}

	function getName($pIl)
	{
		$sql = "SELECT effect_name FROM illusions WHERE iid = $pIl";
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		$retVal = $row["effect_name"];
		mysql_free_result($rs);
		return $retVal;
	}

	function getIllusionsByEvent($p_event, $p_src)
	{
		$sql ="SELECT iid, effect_name, pid, p.p_event, the_order FROM illusions LEFT JOIN picklist p on iid = p.p_illusion AND p.p_event=$p_event LEFT JOIN new_event ON p.p_event=eid WHERE " . ($p_src=='src' ? "":" NOT ") . " isnull(pid) AND b_active=true ORDER BY " . ($p_src== "src" ? "effect_name":"the_order");
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			$ord = ($p_src == "src" ? 0: $row["the_order"]);
			$retVal[$row["iid"]]=$row["effect_name"];
		}
		mysql_free_result($rs);
		return $retVal;
	}
}; // END CLASS Illusions
?>
