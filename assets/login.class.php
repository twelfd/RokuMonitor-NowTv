<?php
class USER
{
    public function login($uname,$upass){
        require 'user.db.class.php';
        $database = new Database();
        $database->query("SELECT * FROM users WHERE username = :uname");
        $database->bind(':uname', $uname);
        $row = $database->single();
        if(!empty($row)){
            if(password_verify($upass, $row['password'])){
                session_start();
                $_SESSION['user_session'] = $row['userID'];
                return true;
            }
            
        }
    }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>
