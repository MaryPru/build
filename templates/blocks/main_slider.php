<div class="main_slider-wrapper">
    <div class="grid-container">
        <div class="grid-x">
            <div class="main_slider">
                <?php
                include './src/database.php';
                $database =require ('./src/database.php');
                $items = $database['slider-item'];
                foreach ($items as $key => $value) {
                    $itemTitle = $value['title'];
                    $itemPicture = $value['picture'];
                    $itemText = $value['text'];
                    include('./templates/blocks/main_slider_item.php');

                };
                ?>

            </div>
        </div>
    </div>
</div>