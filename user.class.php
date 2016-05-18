<?php
/*
 * user.class.php
 * 
 * Copyright 2013 Anil Kumar Panigrahi<http://www.anil2u.info>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * Author      :  Anil Kumar Panigrahi
 * E-mail      :  kumaranil21@gmail.com
 * Created on  :  13th August 2013
 * Version     :  1.0
 * Project     :  WebService
 * Page        :  User Class
 * Company     :  Anil Labs  (http://www.anil2u.info)
 * Modified on :   
 * Modified by :   
 */

//$mysqli = new mysqli('localhost','root','0303');
$mysqli = new mysqli('ap-cdbr-azure-southeast-b.cloudapp.net','b5a3e343f57232','eae92a34');


class Users {
    
    //Declaring variables
    private $username;
    private $password;
    private $connection;

    //Setting username and password
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    } 
    // Login Method
    public function login($connection, $database, $table, $usernameField, $passwordField) {
        $connection->select_db($database);
        $statement = $connection->prepare("SELECT COUNT(*) FROM $table WHERE $usernameField = ? AND $passwordField = ?");
        $statement->bind_param('ss', $this->username, $this->password);
        $statement->execute();
        $statement->bind_result($count);
        $statement->fetch();
        return $count;
       
    }
}


?>
