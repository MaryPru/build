<div class="main_photogallery">
    <div class="grid-container">
        <div class="main_photogallery-heading heading">Фотогалерея</div>
        <div class="main_photogallery-slider slider-arrows slider-dots">
            <?php
            include './src/database.php';
            $database =require ('./src/database.php');
            $items = $database['photogallery-item'];
            foreach ($items as $key => $value) {
                $itemPicture = $value['picture'];
                $itemCaption=$value['caption'];
                include('./templates/blocks/main_photogallery-item.php');

            };
            ?>

        </div>
    </div>
</div>