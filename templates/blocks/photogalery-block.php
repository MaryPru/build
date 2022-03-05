<div class="photogallery">
    <div class="grid-container">
        <div class="photogallery-for slider-dots">
            <?php
            include './src/database.php';
            $database =require ('./src/database.php');
            $items = $database['photogallery-item'];
            foreach ($items as $key => $value) {
                $itemPicture = $value['picture'];
                $itemCaption=$value['caption'];
                include('./templates/blocks/photogallery-slider-item.php');

            };
            ?>

        </div>
        <div class="photogallery-nav">
            <?php
            include './src/database.php';
            $database =require ('./src/database.php');
            $items = $database['photogallery-item'];
            foreach ($items as $key => $value) {
                $itemPicture = $value['picture'];
                $itemCaption=$value['caption'];
             echo   '<div class="photogallery-nav-item">
                <div class="photogallery-nav-img"><img src= '.$itemPicture.' alt="" title=""></div>
            </div>';

            };
            ?>

        </div>
    </div>
</div>