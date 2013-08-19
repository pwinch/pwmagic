<?php
class RingEvent{
	private $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}

	function __destruct()
	{
	}

	function getEvents()
	{
		$retVal = array();
		$sql = "SELECT sid, descr FROM showevent WHERE event_date >= now() order by event_date";
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			$retVal[$row["sid"]]=$row["descr"];
		}
		mysql_free_result($rs);
		return $retVal;
	}
		
	function add($recnum, $field, $value)
	{
		#echo "RECNUM: $recnum\n";
		$sql = "INSERT INTO rings_events_signup(resid, $field) VALUES ($recnum, '" . mysql_real_escape_string($value) . "') ON DUPLICATE KEY UPDATE $field='" . mysql_real_escape_string($value) . "', resid=LAST_INSERT_ID(resid)";
#		echo "$sql\n";
		mysql_query($sql, $this->db->magic());
                $result=mysql_query("SELECT LAST_INSERT_ID() iid", $this->db->magic());
                $rsrow=mysql_fetch_assoc($result);
		#echo "$result\n";

                $recval = trim($rsrow["iid"]);

                mysql_free_result($rsrow);
		return $recval;
	}
		

}; // END RINGEVENT
