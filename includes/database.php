<?php
	require_once('config.php');

class MySQLDatabase
{
    private $connection;

    public function __construct(){
       $this->open_connection(); 
    }

    public function open_connection()
    {
	$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if(!$this->connection)
	{
	   die('DB connection failed '.mysql_error()); 
	}
	else
	{
	    $db_select = mysql_select_db(DB_NAME, $this->connection);
	    if(!$db_select)
	    {
		die('Database selection failed: '.mysql_error());
	    }
	}
    }

    public function close_connection()
    {
	if(isset($this->connection))
	{
	    mysql_close($this->connection);
	    unset($this->connection);
	} 
    }

    public function num_rows($result)
    {
       return mysql_num_rows($result); 
    }

    public function insert_id()
    {
       return mysql_insert_id($this->connection); 
    }

    public function affected_rows()
    {
       return mysql_insert_id($this->connection); 
    }

    public function escape_value($value)
    {
       $value = mysql_real_escape_string($value); 
       return $value;
    }

    public function fetch_array($result)
    {
	return mysql_fetch_array($result);
    }

    public function query($sql)
    {
	$result = mysql_query($sql, $this->connection);
	if(!$result)
	{
	    die('Database query failed: '.mysql_errors());	
	}
	return $result;
    }
}

$database = new MySQLDatabase();
?>
