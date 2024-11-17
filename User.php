<?php

 class User{
    public $username;
    public $password;
    public $email;
    public function __construct($username,$password,$email) {
        $this->username= $username;
        if (User::check_password($password)){
            $this->password= $password;
        }
        if(User::validate_email($email)){
            $this->email = $email;
        }

      }
    public static function check_password($pass){
        if(strlen($pass)<12)
        {
            echo "Password should be at least 12 characers long\n";
            return false;
        }
        if(!preg_match('/[^a-zA-Z0-9\s]/', $pass))
        {
            echo "Password should include at least one special character\n";
            return false;
        }
        //check uppercase
        $uppercase_found=false;
        $lowercase_found=false;
        $uppercase_pass = strtoupper($pass);
        $lowercase_pass = strtolower($pass);
        $i=0;
        while(($i < strlen($pass)) && !($uppercase_found && $lowercase_found)){
            if(ctype_upper($pass[$i]))
            {
                $uppercase_found=true;
            }
            if(ctype_lower($pass[$i]))
            {
                $lowercase_found=true;
            }
            $i++;
        }

        if(!$uppercase_found)
        {
            echo "Password should have at least one uppercase letter\n";
            return false;
        }
        if(!$lowercase_found)
        {
            echo "Password should have at least one lowercase letter\n";
            return false;
        }
        echo "Password checked\n";
        return true;

    }
    public static function validate_email($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "Email is not validated\n";
            return false;
        }
        else{
            echo "Email is validated\n";
            return true;
        }
        
    }
    public function copy_with($username = null,$password = null, $email = null){
        $stringified=json_encode($this);
        $new_user = json_decode($stringified);

        if($username)
        {
            $new_user->username=$username;
        }
        if($password)
        {
            $new_user->password=$password;
        }
        if($email)
        {
            $new_user->email=$email;
        }

        return $new_user;
    }
 }

$user =new User("Robert","109$$3pokolL","Robert@gmail.com");
$new_user=$user->copy_with();
echo json_encode($new_user);
echo "\n";
if($new_user === $user)
{
    echo "Referencing same object\n";
}
else{
    echo "Referencing diff object\n";
}
echo "\n";
$new_user=$user->copy_with("Roberto");
echo json_encode($new_user);
echo "\n";
$new_user=$user->copy_with("","100&&Tuopi00");
echo json_encode($new_user);
echo "\n";
$new_user=$user->copy_with("","","r_b#gmail.com");
echo json_encode($new_user);
echo "\n";