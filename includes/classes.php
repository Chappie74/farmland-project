<?php

/**
		 * summary
		 */
		class User 
		{
		    /**
		     * summary
		     */
		    public $first_name;
		    public $last_name;
		    public $lot_number;
		    public $address_line;
		    public $town;
		    public $region;
		    public $email;
		    public $username;
		    public $password;
		    public $phone;
		    public $cash;
		    public $profile_picture;

		    public function __construct($first_name, $last_name, $lot_number,$address_line, $town, $region, $email, $username, $password, $phone, $profile_picture)
		    {
		        $this->first_name = $first_name;
		        $this->last_name = $last_name;
		        $this->lot_number = $lot_number;
		        $this->address_line = $address_line;
		        $this->town = $town;
		        $this->region = $region;
		        $this->email = $email;
		        $this->username = $username;
		        $this->password = $password;
		        $this->phone = $phone;
		        $this->cash = 30000.00;
		        $this->profile_picture = $profile_picture;

		    }
		}

	class Product {
	    function Product($id, $name, $category, $image,$seller,$date_listed, $units, $price)
	    {
	    	$this->id = $id;
	        $this->name = $name;
	        $this->category = $category;
	        $this->image = $image;
	        $this->seller = $seller;
	        $this->date_listed = $date_listed;
	        $this->units = $units;
	        $this->price = $price;
	    }
	}

	class Item {
        function Item($name,$image,$seller,$units, $price, $id)
        {                        
         	$this->name = $name;
            $this->image = $image;
            $this->seller = $seller;
            $this->units = $units;
            $this->price = $price;
            $this->id  = $id;
        }
     }

     /**
      * summary
      */
     class Database 
     {

     	public function connect()
     	{

	        // try to connect to database
	        static $handle;
	        if (!isset($handle))
	        {
	            try
	            {
	                // connect to database
	                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);

	                // ensure that PDO::prepare returns false when passed invalid SQL
	                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
	            }
	            catch (Exception $e)
	            {
	                // trigger (big, orange) error

	                trigger_error($e->getMessage(), E_USER_ERROR);
	                exit;
	            }
	        }

	        return $handle;

     	}

     	
          /**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    public 	function query(/* $sql [, ... ] */)
	    {
	        // SQL statement
	        $sql = func_get_arg(0);

	        // parameters, if any
	        $parameters = array_slice(func_get_args(), 1);
	        $handle = $this->connect();
	        // prepare SQL statement
	        $statement = $handle->prepare($sql);

	        if ($statement === false)
	        {

	            // trigger (big, orange) error            
	            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
	            exit;
	        }
	        
	        // execute SQL statement
	        $results = $statement->execute($parameters);
	        
	        // return result set's rows, if any
	        if ($results !== false)
	        {
	            return $statement->fetchAll(PDO::FETCH_ASSOC);
	        }
	        else
	        {
	            return false;
	        }
	    }
     }



     class cartItem {
                    function cartItem($name,$image,$seller,$units, $price, $id, $user_id,$ava_amt,$p_id)
                    {                        
                        $this->name = $name;
                        $this->image = $image;
                        $this->seller = $seller;
                        $this->units = $units;
                        $this->price = $price;
                        $this->id  = $id;
                        $this->user_id  = $user_id;
                        $this->ava_amt = $ava_amt;
                        $this->p_id = $p_id;

                    }
                }
?>