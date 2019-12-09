<?php
require_once '_template/header.php';
require_once '_lib/product.php';
?>
	<div id="content">
		<?php
                    if ($_GET["action"] == "product" && isset($_GET["id"]))
                    {
                       $id = intval($_GET["id"]);
                       $data = Product::retrieveProductById($id);
                       if(is_array($data)){
                           echo'
                        <div class="title-content">
                                <h1>'.$data['title'].'</h1>
                        </div>
                        <div class="body-content">
                                <div class="image-product">
                                        <img src="_upload/'.$data['image'].'" alt=""/>
                                </div>
                                <div class="detail">
                                        <p>
                                                '.$data['description'].'
                                        </p>
                                </div>
                        </div>
                        ';
                       }else{
                           echo "no product";
                       }
                       
                    }else{
                        header("location: index.php");
                        exit();
                    }
                ?>
	</div>
<?php
require_once '_template/footer.php';
?>

