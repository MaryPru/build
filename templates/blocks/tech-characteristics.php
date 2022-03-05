<div class="tech-characteristics">
    <div class="grid-container">
        <div class="tech-characteristics-heading heading">Технические характеристики бытовок</div>
        <div class="tech-characteristics-wrapper">
            <?php
            include './src/database.php';
            $database =require ('./src/database.php');
            $items = $database['tech-characteristics'];
            foreach ($items as $key => $value) {
                $itemTitle = $value['title'];
                $itemPicture = $value['picture'];
                $itemTable_title = $value['table-title'];
                $type = $value['table-data']['type'];
                $dimensions = $value['table-data']['dimensions'];
                $frame = $value['table-data']['frame'];
                $window = $value['table-data']['window'];
                $exterior_finish = $value['table-data']['exterior-finish'];
                $interior_decoration = $value['table-data']['interior-decoration'];
                $flooring = $value['table-data']['flooring'];
                $outer_door = $value['table-data']['outer-door'];
                $interior_door = $value['table-data']['interior-door'];
                $warming = $value['table-data']['warming'];
                $wiring = $value['table-data']['wiring'];
                $lattice_window= $value['table-data']['lattice-window'];
                include('./templates/blocks/tech-characteristics-item.php');
            };

            ?>

        </div>
        <div class="grid-x">
            <div class="tech-characteristics-link"><span class="btn_blue">Показать еще</span></div>
        </div>
    </div>
</div>