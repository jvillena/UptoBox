<?php
/**
 * The DataBase management class
 *
 * @version 0.1
 * @author Jose Villena
 */
class database {

	/**
	 * Allows multiple database connections
	 * probably not used very often by many applications, but still useful
	 */
	private $connections;



	/**
	 * Record of the last query
	 */
	private $last;

	/**
	 * Hello
	 */
    public function __construct()
    {

    }

    /**
     * Create a new database connection
   	 * @param String $type the type of db ('mysql', 'odbc', ...)
     * @param String database hostname
     * @param String database username
     * @param String database password
     * @param String database we are using
     * @param String char_set coding char default utf8
     * @return int the id of the new connection
     */
    public function newConnection( $type='mysql',$host='localhost', $user, $password, $database, $char_set='utf8' )
    {
        global $config_urls;
    	/* Inclusión de la clase de la base de datos. */
		require_once($config_urls['BASE_PATH'].'application/model/adodb5/adodb.inc.php');
		/* Creación del objeto de base de datos. */	
		$this->connections = ADONewConnection($type);
		$this->connections->debug = DEBUG_SQL;	
		$this->connections->Connect($host, $user,  $password, $database);
		$this->connections->Execute("SET NAMES '".$char_set."'");
    	
        
    	
    	if( mysql_errno() )
    	{
    		trigger_error('Error connecting to host. ', E_USER_ERROR);
		} 	

    	return $this->connections;
    }

    /**
     * Close the active connection
     * @return void
     */
    public function closeConnection()
    {
    	$this->connections->close();
    }

   
    /**
     * Deconstruct the object
     * close all of the database connections
     */
    public function __deconstruct()
    {
    	foreach( $this->connections as $connection )
    	{
    		$connection->close();
    	}
    }
}
?>