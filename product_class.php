<?php


class Products {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "phpoop";
    public $con;
    public $errors = [];

    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->con;
        }
    } 
    public function add_Products($post)
    {
        $model = $this->con->escape_string($_POST['model']); 
        $filename = $_FILES["file"]["name"]; 
        $tempname = $_FILES["file"]["tmp_name"];     
         $folder = "image/".$filename; 
         move_uploaded_file($tempname, $folder);
        
        $title = $this->con->escape_string($_POST['title']);
        $price = $this->con->escape_string($_POST['price']);
        $display = $this->con->escape_string($_POST['display']);
        $hardware = $this->con->escape_string($_POST['hardware']);
        $camera = $this->con->escape_string($_POST['camera']);
        $battery = $this->con->escape_string($_POST['battery']);
        $qty =  $this->con->escape_string($_POST['qty']);
        $query = "INSERT INTO `products` (`model`,`title`,`price`,`display`,`hardware`, `camera`, `battery`, `qty`, `images`) VALUES ('$model','$title','$price','$display','$hardware','$camera','$battery','$qty','$filename')";
        $sql = $this->con->query($query);
        if ($sql == true) {
        echo "ok";
        }else{
            
        }
    }
    public function displayProduct()
    {
        $query = "SELECT * FROM products";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] =  $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

    public function displayUsers(){
        $query = "SELECT * FROM users WHERE role = 'user'";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] =  $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }
       // Delete customer data from customer table
       public function delete($id)
       {
           $query = "DELETE FROM products WHERE id = '$id'";
           $sql = $this->con->query($query);
           if ($sql == true) {
               header("Location:product.php?msg3=delete");
           } else {
               echo "Record does not delete try again";
           }
       }
        public function changePassword($change,$id)
       {
          
          $oldpassword  = $this->con->escape_string($_POST['password']);
          $newpassword  = $this->con->escape_string($_POST['Newpassword']);
          $cnewpassword  = $this->con->escape_string($_POST['CNewpassword']);
          $id = $id;
          $sql = "SELECT * from users";
          $res = $this->con->query($sql);
          if($res->num_rows > 0){
              while($row = $res->fetch_assoc()){
                  $oldpass = $row['password'];
                  if(password_verify($oldpassword, $oldpass)){
           
                     if($newpassword == $cnewpassword){
                        $password = password_hash($newpassword, PASSWORD_BCRYPT);
                        $query = "UPDATE users SET password = '$password' WHERE id = '$id'";
                        $sql = $this->con->query($query);
                        if ($sql == true) {
                            header("Location:index.php?msg2=update");
                        } else {
                            $this->errors[] = "Registration updated failed try again!";
                        }
                     }else{
                        $this->errors[] = "Password and Confirm password doesn't match!";
                     }
                  }else{
                    $this->errors[] = "Old Password faild!";
                  }
              }
          }
       }
       public function get_errors()
    {
        return  $this->errors;
    }
}