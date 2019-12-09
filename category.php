<?php
require_once '_template/header.php';
require_once './_lib/product.php';
?>
	<div id="content">
		<?php
                   if ($_GET["action"] == "category" && isset($_GET["id"]))
                    {
                        $id = intval($_GET["id"]);
                        if(is_array(Product::getLastNineProductsForEachCategory($id))){
                            foreach (Product::getLastNineProductsForEachCategory($id) AS $value):
                            echo '
                            <div class="product">
                                    <img src="_upload/'.$value['image'].'"/>
                                    <p><a href="product.php?action=product&id='.$value['id'].'">'.$value['title'].' </a></p>
                            </div>
                        ';
                        endforeach;
                        }else{
                            echo "not found any product";
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

