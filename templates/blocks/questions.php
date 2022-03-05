<div class="often-question">
    <div class="grid-container">
        <div class="often-question heading">Часто задаваемые вопросы</div>
        <div class="often-question-wrapper">
            <?php
            include './src/database.php';
            $database =require ('./src/database.php');
            $items = $database['questions'];
            foreach ($items as $key => $value) {
                $itemTitle = $value['title'];
                $itemDescription = $value['description'];
                include('./templates/blocks/question-item.php');

            };
            ?>

        </div>
    </div>
</div>