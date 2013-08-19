<?php

class Rating{

	function __construct($db, $p_event=0, $p_rating=0)
	{
		$this->db = $db;
		$this->p_event=$p_event;
		$this->p_rating=$p_rating;
	}

	function getRating()
	{
		$retVal = 0;
		$sql = "SELECT rating from rating where p_event=$this->p_event AND p_rating=$this->p_rating";
#echo $sql . "<br />";
		$rs = mysql_query($sql,$this->db->magic());
		$row = mysql_fetch_assoc($rs);
		$retVal = $row["rating"];
		mysql_free_result($rs);
		return $retVal;
	}
};//END CLASS RATING



