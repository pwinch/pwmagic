<?php

	class Database{
		function __construct()
		{
			$this->dbc_magic = NULL;
		}

        function connectManually($host, $user, $password, $database)
        {
                $manual = null;
                try
                {
                        $manual = mysql_connect($host, $user, $password, $database);
                        if($manual === false)
                                throw new Exception('Could not connect to manually to '.$host.' MySQL server: '.mysql_error());
                        if(mysql_select_db($database, $manual) === false)
                                throw new Exception('Could not change to '.$database.': '.mysql_error());
                }
                catch(Exception $e)
                {
//                      mail('r.rivas@exteres.com','Database Connection Error', $e->getMessage());
//                      echo 'This page cannot be displayed';
//                      exit;
                        return false;
                }
                return $manual;
        }

        function connectMagic()
        {
                $user = 'pwmag_admin';
                $password = 'Ma61c1an';
                $database = 'pwmagic';
                $host = '208.109.205.159';

                $this->dbc_magic = $this->connectManually($host, $user, $password, $database);

                return $this->dbc_magic;
        }
		
		function magic()
		{
			return $this->dbc_magic;
		}
		
		function disconnectMagic()
		{
			mysql_close($this->dbc_magic);
		}		
		
		public $dbc_magic;
	};//END DATABASE();
?>
