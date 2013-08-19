<?php
class reqQuote{

	function __construct($db, $p_contact)
	{
		$this->db = $db;
		$this->contact = $p_contact;
	}

	function getFName()
	{
		$sql = "SELECT fname FROM new_contacts WHERE nid=$this->contact";
		#mail("peter@peterwinchmagic.com","sql",$sql);
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		$retVal = $row["fname"];
		mysql_free_result($rs);
		return $retVal;
	}

	function getEventFormal()
	{
		$sql = "SELECT e.category, e.sub_category FROM events e, new_event ne WHERE ne.p_event=e.eid AND ne.p_contact=$this->contact";
		#mail("peter@peterwinchmagic.com","sql",$sql);
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		$retVal = ucwords($row["category"]) . ' ' . ucwords($row["sub_category"]) . " Event";
		mysql_free_result($rs);
		return $retVal;
	}


}; // END CLASS reqQuote
