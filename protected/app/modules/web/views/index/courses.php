<section class="container">
    <?php
    $m = \app\models\Articles::findOne(['id'=>1]);
    echo $m->content;
    ?>
</section>