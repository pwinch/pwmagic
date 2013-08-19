<?php
class mi_forms{

	function __construct($db)
	{
		$this->db=$db;
	}

	function getList(&$theList)
	{
		$sql = "SELECT mid, labal, var, formval, priority, active FROM pwmagic.mi_forms ORDER BY priority";
		$rs = mysql_query($sql, $this->db->exteres());
		while($row = mysql_fetch_assoc($rs))
		{
			$theList[]=$row;
		}
		mysql_free_result($rs);
	}
};// END CLASS MI_FORMS
