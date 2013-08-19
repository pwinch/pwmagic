<?php

class Events{

	function __construct($db, $p_event=0)
	{
		$this->db = $db;
		$this->p_event = $p_event;
	}

	function getEvents(&$e_list)
	{
		$sql = " SELECT event_name, concat(fname , ' ', lname, ' ' , company) as subname, eid FROM new_event, new_contacts WHERE p_contact=nid AND event_date >= now() ORDER BY event_date, event_name";
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			$e_list[$row["eid"]] = $row["event_name"]  . " " . $row["subname"];
		}
		mysql_free_result($rs);
	}
	function getEventInfo(&$eInfo)
	{
		$sql = "SELECT event_name, concat(fname, ' ', lname) as contact, event_date, email FROM new_event, new_contacts WHERE p_contact=nid AND eid=$this->p_event";
##echo $sql;
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		$eInfo["contact"] = $row["contact"];
		$eInfo["date"] = $row["event_date"];
		$eInfo["email"] = $row["email"];
		mysql_free_result($rs);
	}
}; // END CLASS EVENTS
