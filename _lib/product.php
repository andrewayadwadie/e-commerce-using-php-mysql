<?php
$config = '../config.php';
if(file_exists($config)){
    require_once $config;
}else{
    require_once 'config.php';
}
class Product
{
    // member variables
    private $id;
    private $id_category = null;
    private $title;
    private $id_memeber = null;
    private $image_name;
    private $image_temp;
    private $description;
    
    // methods
    public function __construct($title, $idCategory, $idMmeber, $imageName, $imageTemp, $descrption, $id="")
    {
        $this->id = $id;
        $this->title = $title;
        $this->id_category = $idCategory;
        $this->id_memeber = $idMmeber;
        $this->image_name = $imageName;
        $this->image_temp = $imageTemp;
        $this->description = $descrption;
    }
    
    // add product to database
    public function addProduct()
    {
        if($this->title == NULL || $this->description == NULL)
            return FALSE;
        else{
            if(is_uploaded_file($this->image_temp))
            {
                global $dbh;
                $imageName = time().  $this->image_name;
                move_uploaded_file($this->image_temp, "../_upload/".$imageName);
                $sql = $dbh->prepare("INSERT INTO product (id_category, title, id_memeber, image, description ) VALUES('$this->id_category', '$this->title', '$this->id_memeber', '$imageName', '$this->description')");
                $sql->execute();
                if(FALSE !== $sql)
                    return TRUE;
                ELSE
                    return FALSE;
            }else{
                return FALSE;
            }
        }
    }
    
    public static  function selectAllProduct()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT id, title FROM product");
        $sql->execute();
        $data = null;
        while($fetch= $sql->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = $fetch;
        }
        return $data;
    }
    
    
     // DELETE MEMBER FROM DATABASE BY ID
    public static function deleteProductById($id)
    {
        global $dbh;
        $sql = $dbh->prepare("DELETE FROM product WHERE id='$id'");
        $sql->execute();
        if(FALSE !== $sql)
            return TRUE;
        else 
            return FALSE;
    }
    
    // SELECT product FROM DATABASE BY ID
    public static  function retrieveProductById($id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT * FROM product WHERE id='$id'");
        $sql->execute();
        $fetch= $sql->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }
 
    // update product In Database
    public function updateProductById()
    {
        if($this->title == NULL || $this->description == NULL)
               return FALSE;
        else{
                global $dbh;
                if(is_uploaded_file($this->image_temp)){
                    $this->image_name = time().$this->image_name;   
                    move_uploaded_file($this->image_temp, "../_upload/".$this->image_name);
                    $sql = $dbh->prepare("UPDATE product SET
                                            id_category = '$this->id_category',
                                            title = '$this->title',
                                            image  = '$this->image_name',
                                            id_memeber = '$this->id_memeber',
                                            description = '$this->description'
                                            WHERE id = '$this->id'
                    ");

                    $sql->execute();
                        if(FALSE!==$sql)
                            return TRUE;
                        ELSE
                            return FALSE;
                }else{
                    return FALSE;
                }
         }
    }
    
    public static function getLastNineProducts()
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT id, title, image FROM product ORDER BY id DESC LIMIT 9");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
    
    public static function getLastNineProductsForEachCategory($id)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT id, title, image FROM product 
            WHERE id_category='$id' ORDER BY id DESC LIMIT 9 ");
        $sql->execute();
        $data = null;
        while($fetch = $sql->fetch(PDO::FETCH_ASSOC)){
            $data[] = $fetch;
        }
        return $data;
    }
}
