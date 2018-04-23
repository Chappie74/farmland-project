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
		    private $last_name;
		    private $lot_number;
		    private $address_line;
		    private $town;
		    private $region;
		    private $email;
		    private $username;
		    private $password;
		    private $phone;
		    private $cash;
		    private $profile_picture;

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

?>