<?php

class ShowEvent{
	
	function __construct($db, $ref)
	{
		$this->db = $db;
		$this->ref = $ref;
	}

	function getInfo(&$info)
	{
		$sql = "SELECT sid, descr, event_date, qtytix, logo, p_form, p_thankyou FROM showevent WHERE ref='$this->ref'";
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		extract($row);
		$info["desc"]=$descr;
		$info["sid"] = $sid;
		$info["event_date"]=$event_date;
		$info["qty"] = $qtytix;
		$info["logo"] = $logo;
		$info["p_form"] = $p_form;
		$info["p_thankyou"] = $p_thankyou;
	}

	function getQtyLeft()
	{
		$sql = "SELECT sum(qty_needed) as tixsold, qtytix FROM showevent, showtixsold WHERE p_event=sid AND ref='$this->ref'";
		$sql = "SELECT sum(qty_needed) as tixsold, qtytix FROM showevent LEFT JOIN showtixsold ON p_event=sid AND ref='ibm' GROUP BY qtytix";
		$sql = "SELECT sum(qty_needed) as tixsold, qtytix FROM showevent LEFT JOIN showtixsold ON p_event=sid WHERE ref='ibm' GROUP BY qtytix";
#echo "SQL: $sql\n";
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);

		extract($row);
		$remqty = $qtytix -  $tixsold;
		mysql_free_result($rs);
		return $remqty;
	}


	function getIndInfo(&$info)
	{
		$sql = "SELECT p_event, st.contact_name,st.contact_email, descr, logo, event_date, qty_needed FROM showevent LEFT JOIN showtixsold st on p_event=sid AND stid=$this->ref";
		$rs = mysql_query($sql, $this->db->magic());
		$row = mysql_fetch_assoc($rs);
		extract($row);
		$info["desc"]=$descr;
		$info["p_event"]=$p_event;
		$info["qty"]=$qty_needed;
		$info["event_date"]=$event_date;
		$info["logo"]="../" . $logo;
		$info["contact"]=$contact_name;
		$info["email"]=$contact_email;
	}
}; // END CLASS ShowEvent
