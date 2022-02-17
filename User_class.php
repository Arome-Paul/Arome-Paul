<?php
    //all the data related to the supplied userid are retreived first from the database before setting them as values to  the user class properties
    
    //connecting to the database 
    @$con = mysqli_connect('localhost','root','paulpass123456');
    if(!$con){
        echo 'Error: Could not establish connect between database. Please try again later';
        exit;
    }
    
    //selecting database to use
    @$db = mysqli_select_db($con,'softamplify');
    if(!$db){
        echo "Error: no database is been selected. Please try again later";
        exit;
    }
    
    //the supplied userid will be store in the userid variable
    $userid = 2;
    
    //selecting data from the users and user_data table in order to use them as property values for the user class
    $column_select = "select * from users,user_data where users.user_id ='" . $userid . "' and user_data.user_id ='" . $userid . "'"; 
    $query_selection = mysqli_query($con,$column_select);
    $row = mysqli_fetch_array($query_selection);
    
    //creating the user class
    class user{
        //creating the user class properties/attributes
        var $user_id;
        var $username;
        var $email;
        var $type;
        var $reg_date;
        var $last_seen;
        var $last_login;
        var $first_name;
        var $last_name;
        var $middle_name;
        var $dob;
        var $gender;
        var $photo;
        var $zip;
        var $address;
        var $city;
        var $state;
        var $country;
        
        //the user class contructor
        public function __construct($user_id,$username,$email,$type,$reg_date,$last_seen,$last_login,$first_name,$last_name,$middle_name,$dob,$gender,$photo,$zip,$address,$city,$state,$country){
            
            $this->user_id = $user_id;
            $this->username = $username;
            $this->email = $email;
            $this->type = $type;
            $this->reg_date = $reg_date;
            $this->last_seen = $last_seen;
            $this->last_login = $last_login;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->middle_name = $middle_name;
            $this->dob = $dob;
            $this->gender = $gender;
            $this->photo = $photo;
            $this->zip = $zip;
            $this->address = $address;
            $this->city = $city;
            $this->state = $state;
            $this->country = $country;
        }
    }
    
    //instantiating the user class and assigning it properties the values gotton from the user and user_data table 
    $user = new user($row['user_id'],$row['username'],$row['email'],$row['type'],$row['reg_date'],$row['last_seen'],$row['last_login'],$row['first_name'],$row['last_name'],$row['middle_name'],$row['dob'],$row['gender'],$row['photo'],$row['zip'],$row['address'],$row['city'],$row['state'],$row['country']);
    
    echo $user->username . $user->city . $user->email;
?>