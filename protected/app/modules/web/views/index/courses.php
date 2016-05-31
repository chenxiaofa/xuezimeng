<section class="container">
    <?php
    $m = \app\models\Articles::findOne(['id'=>3]);
    echo $m->content;
    ?>
</section>