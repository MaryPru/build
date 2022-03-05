<!DOCTYPE html>
<html lang="ru">
<?php
include_once('./templates/blocks/head.php');
?>
<body>
<?php
include_once('./templates/blocks/header.php');
?>
<?php
include_once('./templates/blocks/mobile_menu.php');
?>
<main>
    <div class="content price-page">
        <div class="grid-container">
            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li><span>Цены</span></li>
            </ul>
        </div>
        <div class="grid-container">
            <?PHP
            require'./src/database.php';
            $database =require ('./src/database.php');
            $data = $database['pages'];
            $url=$_SERVER['REQUEST_URI'];
            foreach ($data as $key => $value) {
                if($value['url_key']==$url){
                    $title=$value['text'];
                    echo'<h1>'. $title.'</h1>';
                }
            }
            ?>
        </div>
        <div class="price">
            <div class="grid-container">
                <?php
                include_once('./templates/blocks/price-items.php');
                ?>
                <div class="grid-x">
                    <div class="price_download"><a class="price-download" href="#" target="_blank"><i
                                    class="icon-load"></i>Скачать прайс-лист</a></div>
                </div>
            </div>
        </div>
        <?php
        include_once('./templates/blocks/calculator.php');
        ?>
        <?php
        include_once('./templates/blocks/seo-text.php');
        ?>

    </div>
</main>
<?php
include_once('./templates/blocks/footer.php');
?>
<?php
include_once('./templates/blocks/scripts.php');
?>
<?php
include_once('./templates/blocks/form.php');
?>

</body>
</html>