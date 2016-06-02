<?php /** @var \app\models\Articles $model */?>
<section class="container">
    <h1 class="ue_t" label="Title center" name="tc" style="border-bottom-color:#cccccc;border-bottom-width:2px;border-bottom-style:solid;padding:0px 4px 0px 0px;text-align:center;margin:0px 0px 20px;">
        <span style="">
            <?php echo $model->title;?>
        </span>
    </h1>
    <?php echo $model->content; ?>
</section>