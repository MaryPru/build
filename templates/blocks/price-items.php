<div class="price_wrapper">
    <?php
    include './src/database.php';

    $database =require ('./src/database.php');
    $items = $database['item'];

    foreach ($items as $key => $value) {
        $itemTitle = $value['title'];
        $itemPrice = $value['price'];
        include('./templates/blocks/item-bytovka.php');

    };
    ?>
</div>