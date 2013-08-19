<?
	class Leads{
		
		public $db;
		public $iid;
		
		function __construct($db, $iid=0)
		{
			$this->db=$db;
			$this->iid=$iid;
		}
		
		function getCount()
		{
			$sql="SELECT count(lid) as iidcd FROM leads";
			$rs=mysql_query($sql, $this->db->magic());
			$row = mysql_fetch_assoc($rs);
			$retVal = $row["iidcd"];
			mysql_free_result($rs);
			return $retVal;
		} 
	
	};// END class Leads
?>