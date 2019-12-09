<?php
$config = '../config.php';
if(file_exists($config)){
    require_once $config;
}else{
    require_once 'config.php';
}
class Setting
{
    private $title;
    private $keywords;
    private $description;
    private $open_close_site;
    private $message_close_site;
    
    public function __construct($title, $keywords, $description, $open_close_site, $message_close_site) 
    {
        $this->title = $title;
        $this->keywords =$keywords;
        $this->description = $description;
        $this->open_close_site = $open_close_site;
        $this->message_close_site = $message_close_site;
    }
    
    public static function getSetting()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM setting");
        $sql->execute();
        $fetch = $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
    
    public function updateSetting()
    {
         global $dbh;
         $sql = $dbh->prepare("UPDATE setting SET 
                            title = '$this->title',
                            keywords = '$this->keywords',
                            description = '$this->description',
                            open_close_site = '$this->open_close_site',
                            message_close_site = '$this->message_close_site'
                ");
         $sql->execute();
         if(FALSE !== $sql)
                return TRUE;
            ELSE
                return FALSE;
    }
}

