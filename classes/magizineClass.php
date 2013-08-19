class Magazine{

	private $db;

	function __construct($db)
	{
		$this->db = $db;
	};


	function add($data)
	{
		$magazine = unserialize($data);
		extract($data);
		$isql = "INSERT INTO periodicles VALUES (NULL, '" . mysql_real_escape_string($magazine) . "',$vol, $number, '$month',$year)";
		mysql_query($isql, $this->db->magic());
	}


};//
