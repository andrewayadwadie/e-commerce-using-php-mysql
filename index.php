<?php
require_once '_template/header.php';
require_once '_lib/product.php';
?>
	<div id="content">
		<?php
                foreach (Product::getLastNineProducts() AS $value):
                    echo '
                            <div class="product">
                                    <img src="_upload/'.$value['image'].'"/>
                                    <p><a href="product.php?action=product&id='.$value['id'].'">'.$value['title'].' </a></p>
                            </div>
                        ';
                endforeach;
                ?>
	</div>
<?php
require_once '_template/footer.php';
?>