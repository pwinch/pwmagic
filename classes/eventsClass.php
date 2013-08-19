<?php
class Events{

	function __construct($db)
	{
		$this->db = $db;
	}

	function getOptions()
	{
		$sql = "SELECT eid, category, sub_category FROM events WHERE active=true ORDER BY eid";
		$rs = mysql_query($sql, $this->db->magic());

		while($row = mysql_fetch_assoc($rs))
		{
			extract($row);
			$retVal .= "<option value='$eid'>$category" . ($category != "Other" ? ": $sub_category":"") ."</option>\n";
		}
		mysql_free_result($rs);

		return $retVal;
	}
}; // END EVENTS
