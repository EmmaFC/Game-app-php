<?php

// require_once ("../../../app/config/db.php");
// namespace App\Models\User;

class User{

    public $conn;
    private $db_table = "users";
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_password;

 /*    public function __construct($db_connection){
        $this->conn = $db_connection;

    }
 */

    public function getAllUsers(){
        
        $conn = mysqli_connect("localhost", "root", "", "support-crud-app") or die("Connection failed");
        
        $query = "SELECT * FROM " . $this->db_table . "";
        
        $result = mysqli_query($conn, $query);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        mysqli_free_result($result);
        mysqli_close($conn);
        
        return $users;
    }

    public function loadUser($id){

        $conn = mysqli_connect("localhost", "root", "", "support-crud-app") or die("Connection failed");

        $query = "SELECT * FROM " . $this->db_table . " WHERE user_id=" . $id . "";
        if(mysqli_query($conn, $query)){
            echo "Record showm";
        }
        else {
            echo "Failed to show record";
        }
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        // mysqli_free_result($result);
        // mysqli_close($conn);


        return $user;
    }

    public function store($name, $email, $password){
        
        $conn = mysqli_connect("localhost", "root", "", "support-crud-app") or die("Connection failed");
        $query = "INSERT into users (user_name, user_email, user_password) VALUES ('$name','$email','$password')"; //
        if(mysqli_query($conn, $query)){
            echo "Record inserted";
        }
        else {
            echo "Failed to insert record";
        }
        
        mysqli_close($conn);
    }


    public function update($id, $name, $email, $password){
       $conn = mysqli_connect("localhost", "root", "", "support-crud-app") or die("Connection failed");

       $query = "UPDATE users SET user_name='$name', user_email='$email', user_password='$password' WHERE user_id=" . $id . "";
       if(mysqli_query($conn, $query)){
            echo "Record edited";
        }
        else {
            echo "Failed to edit record";
        }
        mysqli_close($conn);
    }

    function destroy($delete_id){

        $conn = mysqli_connect("localhost", "root", "", "support-crud-app") or die("Connection failed");
        $query = "DELETE FROM users WHERE user_id=" . $delete_id . "";
        
        if (mysqli_query($conn, $query)) 
        {
            echo "Record deleted";
        }
        
        else {
            echo "Failed to delete record";
        }

         
        mysqli_close($conn);
    }

}

$user = new User(/* $db_connection */);