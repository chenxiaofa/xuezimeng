<?php /** @var \app\models\Articles $model */?>

<header id="head" class="secondary">
    <div class="container">
        <h1><?php echo $model->title;?></h1>
        <p><?php echo $model->summarization;?></p>
    </div>
</header>
<div class="container" style="margin-top:20px;">
    <?php echo $model->content; ?>
</div>