<?php /** @var \app\models\Articles $model */?>

<header id="head" class="secondary">
    <div class="container">
        <h1><?php echo $model->title;?></h1>
    </div>
</header>
<div class="container">
    <?php echo $model->content; ?>
</div>