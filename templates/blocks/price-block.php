<div class="price">
    <div class="grid-container">
        <div class="price_heading">
            <div class="heading">Цены на аренду блок-контейнеров</div>
            <div class="link-more"><a href="/price.php">Перейти в раздел</a></div>
        </div>
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
        <div class="grid-x">
            <div class="price_link"><span class="btn_blue">Показать еще</span></div>
        </div>
    </div>
</div>

<?php
/*include_once('./templates/blocks/price-items.php');
*/ ?>