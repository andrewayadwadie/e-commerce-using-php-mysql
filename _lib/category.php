<?php
$config = '../config.php';
if(file_exists($config)){
    require_once $config;
}else{
    require_once 'config.php';
}
class Category
{
    // memeber variables 
    private $id;
    private $title;
    private $id_memeber = null;
    
    // methods                                                
    public function __construct($title, $id_memeber, $id="")
    {
        $this->title = $title;
        $this->id_memeber = $id_memeber;
        $this->id = $id;
    }
    
     // add category to database
    public function addCategory()
    {
        if($this->title == NULL || $this->id_memeber == NULL){
            return FALSE;
        }else{
            global $dbh;
            $sql = $dbh->prepare("INSERT INTO category (title, id_memeber) VALUES('$this->title','$this->id_memeber')");
            $sql->execute();
            if(FALSE!==$sql)
            	return TRUE;
            		else 
            	return FALSE;
        }

    }
    
    // select All categories from database
    public static function selectAllcategories()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT id, title FROM category");
        $sql->execute();
        $data =null;
        while($fetch= $sql->fetch(PDO::FETCH_ASSOC))
        {
                $data[] = $fetch;
        }
        return $data;
    }
   
    // DELETE category FROM DATABASE BY ID
    public static function deleteCategoryById($id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM category WHERE id='$id'");
        $sql->execute();
        if(FALSE!==$sql)
            return TRUE;
            	else 
            return FALSE;
                
    }
    
    // SELECT category FROM DATABASE BY ID
    public static function retrieveCategoryById($id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM category WHERE id='$id'");
        $sql->execute();
        $fetch= $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
 
    }
    
    
    // update category In Database
    public function updateCategoryById()
    {
        global $dbh;
        $sql = $dbh->prepare("UPDATE category SET
                              title = '$this->title',
                              id_memeber  = '$this->id_memeber'
                              WHERE id = '$this->id'
                ");

        $sql->execute();
        if(FALSE!==$sql)
            return TRUE;
            	else 
            return FALSE;
                

    }
}