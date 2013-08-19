<?php
class Rating_Categories{


	function __construct($db)
	{
		$this->db = $db;
	}

	function getCategories(&$cats)
	{
		$sql = "SELECT rid, priority, category_desc, max_stars, type FROM rating_categories WHERE p_company=1 and active=true ORDER BY priority";
		$rs = mysql_query($sql, $this->db->magic());
		while($row = mysql_fetch_assoc($rs))
		{
			extract($row);
			$cats["category_desc"][$rid]=$category_desc;
			$cats["type"][$rid]=$type;
			$cats["max_stars"][$rid]=$max_stars;
		}
		mysql_free_result($rs);
	}

};// END RATING CATEGORIES
