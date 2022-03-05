<div class="mobile_menu">
    <div class="mobile_wrap">
        <div class="grid-container">
            <div class="grid-x">
                <div class="hamburger">Меню</div>
                <a class="phone" href="tel:+74957985563">+7 (495) 798-55-63</a>
            </div>
        </div>
    </div>
    <div class="dropdown_menu">
        <ul class="menu">
            <li class="parent"><a href="/catalog.php">Аренда бытовки</a>
                <ul class="submenu">
                    <?php
                    include './src/database.php';
                    $database =require ('./src/database.php');
                    $items = $database['category'];
                    foreach ($items as $key => $value) {
                        $itemTitle = $value['title'];
                        echo '<li><a href="/catalog.php">'.$itemTitle.'</a></li>';

                    };

                    ?>
                </ul>
                <div class="menu-arrows"></div>
            </li>
            <li><a href="/price.php">Цены</a></li>
            <li><a href="/delivery.php">Доставка</a></li>
            <li><a href="/photogallery.php">Фотогалерея</a></li>
            <li><a href="/contacts.php">Контакты</a></li>
        </ul>
        <div class="search">
            <form class="search_form" method="" action="">
                <div class="search-widget">
                    <input type="text" placeholder="Поиск">
                    <button class="search_btn-close" type="submit"><i class="icon-search"></i></button>
                </div>
            </form>
        </div>
        <div class="phones"><a class="phone" href="tel:+74957985563">+7 (495) 798-55-63</a><a class="phone"
                                                                                              href="tel:+74956418568">+7
                (495) 641-85-68</a></div>
    </div>
</div>