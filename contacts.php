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
    <div class="content">
        <div class="grid-container">
            <ul class="breadcrumbs">
                <li><a href="/">Главная</a></li>
                <li><span>Контакты</span></li>
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
        <?php
        include_once('./templates/blocks/contacts-block.php');
        ?>
        <?php
        include_once('./templates/blocks/order_form.php');
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