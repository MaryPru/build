<div class="preview_bytovka-wrapper">
    <div class="grid-container">
        <?php
        include './src/database.php';

        $database =require ('./src/database.php');
        $items = $database['preview_data'];


        foreach ($items as $key => $value) {
            $itemTitle = $value['title'];
            $itemSize = $value['size'];
            $itemPrice= $value['price'];
            include('./templates/blocks/preview-bytovka.php');

        };
        ?>

        <div class="grid-x">
            <div class="preview_bytovka-more"><span class="btn_blue">Показать еще</span></div>
        </div>
    </div>
</div>