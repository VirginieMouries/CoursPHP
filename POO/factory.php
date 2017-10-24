<?php

class Factory{
	
	// je déclare une variable pour compter les instances
	protected static $_instance = null;
	protected static $_conn = null;

	public static function instance() {

		if ( !isset( self::$_instance ) ) {

        	echo", creation instance ";
            
            self::$_instance +=1 ;
            
        }
        
        return self::$_instance;
    }

    public function getConnection($applicant) {
        
        if(!isset(self::$_conn))
        try {          
            
            echo "<br>". $applicant . ": Creation connexion "  ;
            self::$_conn = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8','sta12','11pjgcSwcCVjJYmN');
            // self::$_conn = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
            
            self::$_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);            

            $this->instance();
            
            return self::$_conn;
            
        } catch (PDOException $e) {
            
            
            throw $e;
            
        }
        catch(Exception $e) {
            
            
            throw $e;
            
        } else {
        	echo "<br>". $applicant . " : Connexion exitante " ;
        	return self::$_conn;
        	
        }
    }

	public function __destruct()
	{
		self::$_conn=null;
		self::$_instance= null;
	}
}



