<?php
$config = '../config.php';
if(file_exists($config)){
    require_once $config;
}else{
    require_once 'config.php';
}

class Member
{
    // member Variables
    private $id_member;
    private $username;
    private $password;
    private $email;
    
    public function __construct($username, $password, $email, $id="") 
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->id_member = $id;
    }
    
   
    // add Member to Database 
    public function addMember()
    {
        if($this->username == NULL || $this->password == NULL || $this->email == NULL){
               return FALSE;
        }else{
                global $dbh;
                // to encription your password 
                $encPassword = md5($this->password);
                $sql = $dbh->prepare("INSERT INTO memeber (username, password, email) VALUES('$this->username','$encPassword','$this->email')");
                $sql->execute();
                // $sql !== FALSE
                if(FALSE !== $sql)
                    RETURN TRUE;
                            ELSE
                    RETURN FALSE;
        }

    }
    
    // select All memeber from database
    public static  function selectAllMember()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT id, username FROM memeber");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = $fetch;
        }
        return $data;
    }
    
    // DELETE MEMBER FROM DATABASE BY ID
    public static function deleteMemeberById($id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM memeber WHERE id='$id'");
        $sql->execute();
        if(FALSE !== $sql)
            RETURN TRUE;
              ELSE
            RETURN FALSE;
    }
    
    // SELECT MEMEBER FROM DATABASE BY ID
    public static function retrieveMemeberById($id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM memeber WHERE id='$id'");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updateMemeberById()
    {
        if($this->username == NULL || $this->password == NULL || $this->email == NULL){
               return FALSE;
        }else{
            global $dbh;
            // to encription your password 
            $encPassword = md5($this->password);
            $sql = $dbh->prepare("UPDATE memeber SET
                                  username = '$this->username',
                                  password = '$this->password',
                                  email  = '$this->email'
                                  WHERE id = '$this->id_member'
                    ");
            $sql->execute();
            if(FALSE !== $sql)
                RETURN TRUE;
                  ELSE
                RETURN FALSE;  
        }
    }
    
     // login Memeber and save session to the user
    public static function logInMember($username, $password)
    {
        if($username == NULL || $password == NULL)
                echo "<div class='message'>please insert the fields are required</h1></div>";
        else {
                global $dbh;
                // to encription your password before execute query
                $encPassword = md5($password);
                $sql = $dbh->prepare("SELECT username, password, job_type from memeber WHERE username = '$username' AND password = '$encPassword'");
                $sql->execute();
                $fetch = $sql->fetch(PDO::FETCH_ASSOC);
                if(is_array($fetch)){
                    $_SESSION["userMemeber"] = $fetch["username"];
                    $_SESSION["password"] = $fetch["password"];
                    $_SESSION["job_type"] = $fetch["job_type"];
                    // header used  to redirect to another page 
                    header("location: index.php");
                    exit();
                }else{
                    header("location: login.php?message=error when login");
                    exit();
                }
        }

    }
}

