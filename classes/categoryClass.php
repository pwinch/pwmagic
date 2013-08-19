<?php
class Category{
	public $db;
	function __construct($db)
	{
		$this->db = $db;
	}
	
	function set_category($p_illusion,$cat, $act)
	{
		$isql = "INSERT INTO category (p_illusion, category) VALUES ($p_illusion, '$cat') ON DUPLICATE KEY UPDATE active=$act";
		echo "$isql";
		mysql_query($isql, $this->db->magic());
	}
	function get_category_counts(&$ccount)
	{
		$sql = "SELECT count(cid) as cct, category FROM category GROUP BY category";
		$rs = mysql_query($sql, $this->db->magic());
		while($row=mysql_fetch_assoc($rs))
		{
			extract($row);
			$ccount[$category]=$cct;
		}
		mysql_free_result($rs);
	}
	function get_illusion_by_category(&$info)
	{
		$sql = "SELECT category, p_illusion, effect_name FROM category, illusions WHERE p_illusion=iid ORDER BY category, effect_name";
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			extract($row);
			$info[$category][$p_illusion]=$effect_name;
		}
		mysql_free_result($rs);
	}
};// END CLASS CATEGORY()
?>
